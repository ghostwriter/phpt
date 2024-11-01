<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\File;

use Ghostwriter\Phpt\Interface\FileInterface;

final class ShFile implements FileInterface
{
    public static function new(): self
    {
        return new self();
    }
}
