<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\File;

final class Exp implements ExpInterface
{
    public static function new(): self
    {
        return new self();
    }
}
