<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\File;

use Ghostwriter\Phpt\Interface\File\DiffFileInterface;

final class DiffFile implements DiffFileInterface
{
    public static function new(): self
    {
        return new self();
    }
}
