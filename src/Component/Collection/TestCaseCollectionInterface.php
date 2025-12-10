<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Collection;

use Ghostwriter\PHPt\Component\Test\TestCaseInterface;

interface TestCaseCollectionInterface
{
    public function get(string $id): TestCaseInterface;

    public function has(string $id): bool;

    public function set(string $id, TestCaseInterface $testCase): void;

    /** @return array<non-empty-string,TestCaseInterface> */
    public function toArray(): array;
}
