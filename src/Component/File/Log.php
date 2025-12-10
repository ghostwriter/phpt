<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\File;

final class Log implements LogInterface
{
    public static function new(): self
    {
        return new self();
    }
}
