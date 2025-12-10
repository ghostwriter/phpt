<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Section;

final class File implements FileInterface
{
    public static function new(): self
    {
        return new self();
    }
}
