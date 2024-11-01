<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\File;

use Ghostwriter\Phpt\Interface\File\OutFileInterface;

final class OutFile implements OutFileInterface
{
    public static function new(): self
    {
        return new self();
    }
}
