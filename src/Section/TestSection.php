<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Section;

use Ghostwriter\Phpt\Interface\Section\TestSectionInterface;

final class TestSection implements TestSectionInterface
{
    public static function new(): self
    {
        return new self();
    }
}
