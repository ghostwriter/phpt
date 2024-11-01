<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\File;

use Ghostwriter\Phpt\Interface\File\PhptFileInterface;

final class PhptFile implements PhptFileInterface
{
    public static function new(): self
    {
        return new self();
    }
}
