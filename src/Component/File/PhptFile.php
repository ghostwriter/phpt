<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\File;

use Ghostwriter\Phpt\Component\Section\CreditSectionInterface;
use Ghostwriter\Phpt\Component\Section\SectionInterface;
use Override;
use RuntimeException;
use WeakMap;

use function file_get_contents;

final readonly class PhptFile implements PhptFileInterface
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
    public function diffFile(): DiffFileInterface
    {
        return DiffFile::new();
    }

    #[Override]
    public function expFile(): ExpFileInterface
    {
        return ExpFile::new();
    }

    public function hasCreditSection(): bool
    {
        foreach ($this->weakMap as $file => $section) {
            if (! $section instanceof CreditSectionInterface) {
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
            if ($value instanceof CreditSectionInterface) {
                return true;
            }
        }

        return false;
    }

    #[Override]
    public function logFile(): LogFileInterface
    {
        return LogFile::new();
    }

    #[Override]
    public function outFile(): OutFileInterface
    {
        return OutFile::new();
    }

    #[Override]
    public function phpFile(): PhpFileInterface
    {
        return PhpFile::new();
    }

    #[Override]
    public function shFile(): ShFileInterface
    {
        return ShFile::new();
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
