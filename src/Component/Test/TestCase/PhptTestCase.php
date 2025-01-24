<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Test\TestCase;

use Ghostwriter\Phpt\Component\Section\TestSectionInterface;
use Override;

final readonly class PhptTestCase implements PhptTestCaseInterface
{
    public function __construct(
        private TestSectionInterface $testSection,
        private iterable $sections,
    ) {}

    #[Override]
    public static function new(TestSectionInterface $testSection, iterable $sections): self
    {
        return new self($testSection, $sections);
    }

    #[Override]
    public function sections(): iterable
    {
        return $this->sections;
    }

    #[Override]
    public function testSection(): TestSectionInterface
    {
        return $this->testSection;
    }
}
