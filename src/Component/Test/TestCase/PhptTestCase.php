<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Test\TestCase;

use Ghostwriter\PHPt\Component\Section\TestInterface;
use Override;

final readonly class PHPtTestCase implements PHPtTestCaseInterface
{
    public function __construct(
        private TestInterface $test,
        private iterable $sections,
    ) {}

    #[Override]
    public static function new(TestInterface $test, iterable $sections): self
    {
        return new self($test, $sections);
    }

    #[Override]
    public function sections(): iterable
    {
        return $this->sections;
    }

    #[Override]
    public function testSection(): TestInterface
    {
        return $this->test;
    }
}
