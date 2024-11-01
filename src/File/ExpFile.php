<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\File;

use Ghostwriter\Phpt\Interface\File\ExpFileInterface;

final class ExpFile implements ExpFileInterface
{
    public static function new(): self
    {
        return new self();
    }
}
