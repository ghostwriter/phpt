<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\File;

final class ShFile implements ShFileInterface
{
    public static function new(): self
    {
        return new self();
    }
}
