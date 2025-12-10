<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Runner;

use Ghostwriter\PHPt\Component\ExecutionResult\ExecutionResult;
use Ghostwriter\PHPt\Component\ExecutionResult\ExecutionResultInterface;
use Ghostwriter\PHPt\Component\Parser\ParserInterface;
use Ghostwriter\PHPt\Component\Process\ProcessExecutorInterface;
use Ghostwriter\PHPt\Component\Comparator\ExpectComparatorInterface;
use Ghostwriter\PHPt\Component\Process\ProcessRequest;
use Ghostwriter\PHPt\Component\Process\ProcessResult;
use Ghostwriter\PHPt\Component\File\PHPt;
use Ghostwriter\PHPt\Component\Test\Case\PHPtCaseInterface;
use Ghostwriter\PHPt\EventDispatcher\Event as Events;
use Ghostwriter\EventDispatcher\Interface\EventDispatcherInterface;
use Override;

final class Runner implements RunnerInterface
{
    public function __construct(
        private ParserInterface $parser,
        private ProcessExecutorInterface $executor,
        private ExpectComparatorInterface $comparator,
        private EventDispatcherInterface $dispatcher,
        private RunnerOptions $options,
    ) {}

    #[Override]
    public function run(): ExecutionResultInterface
    {
        $this->dispatcher->dispatch(new Events\Application\Started());
        $this->dispatcher->dispatch(new Events\Application\Configured([]));

        $result = ExecutionResult::new();

        foreach ($this->options->files as $fileOrDir) {
            $paths = [];
            if (is_dir($fileOrDir)) {
                $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($fileOrDir));
                foreach ($it as $f) {
                    if ($f->isFile() && str_ends_with($f->getFilename(), '.phpt')) {
                        $paths[] = (string) $f->getPathname();
                    }
                }
            } elseif (is_file($fileOrDir)) {
                $paths[] = $fileOrDir;
            }

            foreach ($paths as $path) {
                $this->runOne($path, $result);
            }
        }

        $this->dispatcher->dispatch(new Events\Application\Finished());

        return $result;
    }

    private function runOne(string $path, ExecutionResultInterface $result): void
    {
        $phpt = PHPt::new($path);
        $case = $this->parser->parse($phpt);

        $this->dispatcher->dispatch(new Events\Test\Configured());
        $this->dispatcher->dispatch(new Events\Test\Started());

        // If SKIPIF present: run skipif via executor.
        $content = $this->extractSectionContent($phpt, 'SKIPIF');
        if ($content !== null) {
            $req = new ProcessRequest($this->options->phpBinary ?? PHP_BINARY, ['-r', $content], [], null, null, $this->options->timeoutSeconds);
            $r = $this->executor->execute($req);
            if (stripos($r->stdout, 'skip') !== false) {
                $this->dispatcher->dispatch(new Events\Test\Skipped());
                $this->dispatcher->dispatch(new Events\Test\Finished());
                return;
            }
        }

        // Execute main FILE or PHP section
        $fileContent = $this->extractSectionContent($phpt, 'FILE');
        if ($fileContent === null) {
            $this->dispatcher->dispatch(new Events\Test\Terminated());
            $this->dispatcher->dispatch(new Events\Test\Finished());
            return;
        }

        // create a temp file
        $tmp = tempnam(sys_get_temp_dir(), 'phpt_');
        file_put_contents($tmp, $fileContent);

        $req = new ProcessRequest($this->options->phpBinary ?? PHP_BINARY, [$tmp], [], null, null, $this->options->timeoutSeconds);
        $r = $this->executor->execute($req);

        // get expected
        $expectedType = 'EXPECT';
        $expected = $this->extractSectionContent($phpt, 'EXPECT') ?? '';
        if ($this->hasSection($phpt, 'EXPECTF')) {
            $expectedType = 'EXPECTF';
            $expected = $this->extractSectionContent($phpt, 'EXPECTF') ?? $expected;
        }
        if ($this->hasSection($phpt, 'EXPECTREGEX')) {
            $expectedType = 'EXPECTREGEX';
            $expected = $this->extractSectionContent($phpt, 'EXPECTREGEX') ?? $expected;
        }

        $comp = $this->comparator->compare($expectedType, $expected, $r->stdout, []);

        if ($comp->matched) {
            $this->dispatcher->dispatch(new Events\Test\Result\Passed());
        } else {
            $this->dispatcher->dispatch(new Events\Test\Result\Failed());
        }

        $this->dispatcher->dispatch(new Events\Test\Finished());
    }

    private function extractSectionContent(PHPt $phpt, string $section): ?string
    {
        $reflect = new \ReflectionObject($phpt);
        if ($reflect->hasProperty('content')) {
            $prop = $reflect->getProperty('content');
            $prop->setAccessible(true);
            $content = $prop->getValue($phpt);
            if (! is_string($content)) {
                return null;
            }

            $sections = $this->tokenizeSections($content);
            $key = strtoupper($section);
            return $sections[$key] ?? null;
        }

        return null;
    }

    /**
     * @return array<string,string>
     */
    private function tokenizeSections(string $text): array
    {
        $lines = preg_split("/\r\n|\n|\r/", $text);
        $sections = [];
        $current = null;
        $buffer = [];

        foreach ($lines as $line) {
            if (preg_match('/^--([A-Z0-9_]+)--$/', trim($line), $m)) {
                if ($current !== null) {
                    $sections[$current] = implode("\n", $buffer);
                    $buffer = [];
                }
                $current = $m[1];
                continue;
            }

            if ($current === null) {
                continue;
            }

            $buffer[] = $line;
        }

        if ($current !== null) {
            $sections[$current] = implode("\n", $buffer);
        }

        return $sections;
    }

    private function hasSection(PHPt $phpt, string $section): bool
    {
        return $this->extractSectionContent($phpt, $section) !== null;
    }
}
