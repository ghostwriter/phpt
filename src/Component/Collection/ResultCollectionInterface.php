<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Collection;

use Ghostwriter\Phpt\Component\Test\ResultInterface;

interface ResultCollectionInterface
{
    public function add(ResultInterface $result): void;

    public function all(): iterable;

    public function broken(): iterable;

    public function count(): int;

    public function failed(): iterable;

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

    public function slow(): iterable;

    public function warned(): iterable;

    public function xFailed(): iterable;

    public function xLeaked(): iterable;
}
