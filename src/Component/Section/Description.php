<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Section;

final class Description implements DescriptionInterface
{
    public static function new(): self
    {
        return new self();
    }
}
