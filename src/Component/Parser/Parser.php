<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Parser;

use Ghostwriter\PHPt\Component\File\PHPt;
use Ghostwriter\PHPt\Component\Test\Case\PHPtCase;
use Ghostwriter\PHPt\Component\Test\TestCase\PHPtTestCase;
use Ghostwriter\PHPt\Component\File\PHPtInterface;
use Ghostwriter\PHPt\Component\Test\Case\PHPtCaseInterface;
use Ghostwriter\PHPt\Component\Section\SectionInterface;
use Ghostwriter\PHPt\Component\Section\File as FileSection;
use Ghostwriter\PHPt\Component\Section\Test as TestSection;
use Ghostwriter\PHPt\Component\Section\SkipIf as SkipIfSection;
use Ghostwriter\PHPt\Component\Section\Expect as ExpectSection;
use Override;

final class Parser implements ParserInterface
{
    public static function new(): self
    {
        return new self();
    }

    #[Override]
    public function parse(PHPtInterface $phpt): PHPtCaseInterface
    {
        $content = (string) $phpt->phpFile();

        // naive parsing: split by --SECTION-- markers
        $raw = file_get_contents($phpt->phpFile()->file ?? '');

        $text = $this->getContentFromPHPt($phpt);

        $sections = $this->tokenizeSections($text);

        $files = [];
        $testSection = TestSection::new();

        foreach ($sections as $name => $body) {
            $nameUpper = strtoupper($name);
            switch ($nameUpper) {
                case 'FILE':
                    $files[] = $body;
                    break;
                case 'TEST':
                    // ignore
                    break;
                case 'SKIPIF':
                    // keep skipif body in files array as special
                    $files[] = "--SKIPIF--\n" . $body;
                    break;
                case 'EXPECT':
                case 'EXPECTF':
                case 'EXPECTREGEX':
                    $files[] = "--EXPECT--\n" . $body;
                    break;
                default:
                    $files[] = "--{$nameUpper}--\n" . $body;
            }
        }

        $phptTestCase = PHPtTestCase::new(TestSection::new(), $files);

        return PHPtCase::new($phptTestCase, new \WeakMap());
    }

    private function getContentFromPHPt(PHPtInterface $phpt): string
    {
        // try to read private content via reflection as PHPt stores raw content privately
        $reflect = new \ReflectionObject($phpt);
        if ($reflect->hasProperty('content')) {
            $prop = $reflect->getProperty('content');
            $prop->setAccessible(true);
            $content = $prop->getValue($phpt);
            if (is_string($content)) {
                return $content;
            }
        }

        return '';
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
}
