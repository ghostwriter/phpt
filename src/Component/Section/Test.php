<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Section;

final class Test implements TestInterface
{
    public static function new(): self
    {
        return new self();
    }
}
