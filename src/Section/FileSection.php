<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Section;

use Ghostwriter\Phpt\Interface\Section\FileSectionInterface;

final class FileSection implements FileSectionInterface
{
    public static function new(): self
    {
        return new self();
    }
}
