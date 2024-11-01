<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Section;

use Ghostwriter\Phpt\Interface\Section\ExpectSectionInterface;

final class ExpectSection implements ExpectSectionInterface
{
    public static function new(): self
    {
        return new self();
    }
}
