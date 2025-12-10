<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Collection;

use Ghostwriter\PHPt\Component\Test\TestCaseInterface;
use OutOfBoundsException;
use Override;

use function array_key_exists;

final class TestCaseCollection implements TestCaseCollectionInterface
{
    public function __construct(
        private array $testCases = [],
    ) {}

    public static function new(): self
    {
        return new self();
    }

    #[Override]
    public function get(string $id): TestCaseInterface
    {
        return $this->testCases[$id] ?? throw new OutOfBoundsException("TestCase with ID '{$id}' not found.");
    }

    #[Override]
    public function has(string $id): bool
    {
        return array_key_exists($id, $this->testCases);
    }

    #[Override]
    public function set(string $id, TestCaseInterface $testCase): void
    {
        $this->testCases[$id] = $testCase;
    }

    #[Override]
    public function toArray(): array
    {
        return $this->testCases;
    }
}
