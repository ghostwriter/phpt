<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\File;

interface PhptFileInterface extends FileInterface
{
    public function diffFile(): DiffFileInterface;

    public function expFile(): ExpFileInterface;

    public function logFile(): LogFileInterface;

    public function outFile(): OutFileInterface;

    public function phpFile(): PhpFileInterface;

    public function shFile(): ShFileInterface;
}
