<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Section;

use Ghostwriter\Phpt\Interface\Section\DescriptionSectionInterface;

final class DescriptionSection implements DescriptionSectionInterface
{
    public static function new(): self
    {
        return new self();
    }
}
