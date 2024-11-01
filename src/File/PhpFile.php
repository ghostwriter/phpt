<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\File;

use Ghostwriter\Phpt\Interface\File\PhpFileInterface;

final class PhpFile implements PhpFileInterface
{
    public static function new(): self
    {
        return new self();
    }
}
