<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Comparator;

interface ExpectComparatorInterface
{
    /**
     * Compare actual output against expected content.
     * ExpectedType can be 'EXPECT', 'EXPECTF', 'EXPECTREGEX'.
     */
    public function compare(string $expectedType, string $expected, string $actual, array $options = []): ComparisonResult;
}
