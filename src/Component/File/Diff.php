<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\File;

final class Diff implements DiffInterface
{
    public static function new(): self
    {
        return new self();
    }
}
