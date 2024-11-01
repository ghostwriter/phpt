<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Section;

use Ghostwriter\Phpt\Interface\Section\CreditSectionInterface;

final class CreditSection implements CreditSectionInterface
{
    public static function new(): self
    {
        return new self();
    }
}
