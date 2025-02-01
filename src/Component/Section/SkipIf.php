<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Section;

final class SkipIf implements SkipIfInterface
{
    public static function new(): self
    {
        return new self();
    }
}
