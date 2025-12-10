<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Comparator;

final readonly class ComparisonResult
{
    public function __construct(
        public string $status,
        public bool $matched,
        public ?string $diff = null,
        public ?string $reason = null,
    ) {}
}
