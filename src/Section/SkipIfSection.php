<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Section;

use Ghostwriter\Phpt\Interface\Section\SkipIfSectionInterface;

final class SkipIfSection implements SkipIfSectionInterface
{
    public static function new(): self
    {
        return new self();
    }
}
