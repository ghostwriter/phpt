<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Section;

final class SkipIfSection implements SkipIfSectionInterface
{
    public static function new(): self
    {
        return new self();
    }
}
