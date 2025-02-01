<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\File;

final class Sh implements ShInterface
{
    public static function new(): self
    {
        return new self();
    }
}
