<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Collection;

use Ghostwriter\PHPt\Component\Test\ResultInterface;

interface ResultCollectionInterface
{
    public function broken(): iterable;

    public function count(): int;

    public function failed(): iterable;

    public function get(string $id): ResultInterface;

    public function has(string $id): bool;

    public function hasBroken(): bool;

    public function hasFailures(): bool;

    public function hasLeaked(): bool;

    public function hasSlowTests(): bool;

    public function hasWarnings(): bool;

    public function hasXFailed(): bool;

    public function hasXLeaked(): bool;

    public function isEmpty(): bool;

    public function isNotEmpty(): bool;

    public function leaked(): iterable;

    public function set(string $id, ResultInterface $result): void;

    public function slow(): iterable;

    /** @return array<non-empty-string,ResultInterface> */
    public function toArray(): array;

    public function warned(): iterable;

    public function xFailed(): iterable;

    public function xLeaked(): iterable;
}
