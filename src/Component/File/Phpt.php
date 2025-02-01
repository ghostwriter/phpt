<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\File;

use Ghostwriter\Phpt\Component\Section\CreditInterface;
use Ghostwriter\Phpt\Component\Section\SectionInterface;
use Override;
use RuntimeException;
use WeakMap;

use function file_get_contents;

final readonly class Phpt implements PhptInterface
{
    /**
     * @var WeakMap<FileInterface,SectionInterface>
     */
    private WeakMap $weakMap;

    private function __construct(
        private string $file,
        private string $content,
    ) {
        $this->weakMap = new WeakMap();
    }

    public static function new(string $file): self
    {
        $content = file_get_contents($file);

        if (false === $content) {
            throw new RuntimeException('Failed to read file');
        }

        return new self($file, $content);
    }

    // $test->hasSection('PHPDBG')
    #[Override]
    public function diffFile(): DiffInterface
    {
        return Diff::new();
    }

    #[Override]
    public function expFile(): ExpInterface
    {
        return Exp::new();
    }

    public function hasCreditSection(): bool
    {
        foreach ($this->weakMap as $file => $section) {
            if (! $section instanceof CreditInterface) {
                continue;
            }

            if (! $file instanceof FileInterface) {
                continue;
            }

            return true;
        }

        return false;
    }

    public function hasSection(string $section): bool
    {
        foreach ($this->weakMap as $name => $value) {
            if ($name === $section) {
                return true;
            }
        }

        foreach ($this->weakMap as $name => $value) {
            if ($value instanceof CreditInterface) {
                return true;
            }
        }

        return false;
    }

    #[Override]
    public function logFile(): LogInterface
    {
        return Log::new();
    }

    #[Override]
    public function outFile(): OutInterface
    {
        return Out::new();
    }

    #[Override]
    public function phpFile(): PhpInterface
    {
        return Php::new();
    }

    #[Override]
    public function shFile(): ShInterface
    {
        return Sh::new();
    }
}

// $diff_filename = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'diff';
// $log_filename = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'log';
// $exp_filename = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'exp';
// $output_filename = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'out';
// $memcheck_filename = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'mem';
// $sh_filename = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'sh';
// $temp_file = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'php';
// $test_file = $test_dir . DIRECTORY_SEPARATOR . $main_file_name . 'php';
// $temp_skipif = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'skip.php';
// $test_skipif = $test_dir . DIRECTORY_SEPARATOR . $main_file_name . 'skip.php';
// $temp_clean = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'clean.php';
// $test_clean = $test_dir . DIRECTORY_SEPARATOR . $main_file_name . 'clean.php';
// $preload_filename = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'preload.php';
// $tmp_post = $temp_dir . DIRECTORY_SEPARATOR . $main_file_name . 'post';
// $tmp_relative_file = str_replace(__DIR__ . DIRECTORY_SEPARATOR, '', $test_file) . 't';
