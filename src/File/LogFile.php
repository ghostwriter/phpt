<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\File;

use Ghostwriter\Phpt\Interface\File\LogFileInterface;

final class LogFile implements LogFileInterface
{
    public static function new(): self
    {
        return new self();
    }
}
