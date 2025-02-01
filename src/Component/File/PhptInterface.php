<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\File;

interface PhptInterface extends FileInterface
{
    public function diffFile(): DiffInterface;

    public function expFile(): ExpInterface;

    public function logFile(): LogInterface;

    public function outFile(): OutInterface;

    public function phpFile(): PhpInterface;

    public function shFile(): ShInterface;
}
