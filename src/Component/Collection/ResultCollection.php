<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Collection;

use Ghostwriter\PHPt\Component\Test\ResultInterface;
use OutOfBoundsException;
use Override;

use function array_key_exists;

final class ResultCollection implements ResultCollectionInterface
{
    public function __construct(
        private array $results = [],
    ) {}

    public static function new(): self
    {
        return new self();
    }

    //    #[Override]
    //    public function add(ResultInterface $result): void {}
    //
    //    #[Override]
    //    public function all(): iterable
    //    {
    //        yield from [];
    //    }

    #[Override]
    public function broken(): iterable
    {
        yield from [];
    }

    #[Override]
    public function count(): int
    {
        return 0;
    }

    #[Override]
    public function failed(): iterable
    {
        yield from [];
    }

    #[Override]
    public function get(string $id): ResultInterface
    {
        return $this->results[$id] ?? throw new OutOfBoundsException("Result with ID '{$id}' not found.");
    }

    #[Override]
    public function has(string $id): bool
    {
        return array_key_exists($id, $this->results);
    }

    #[Override]
    public function hasBroken(): bool
    {
        return false;
    }

    #[Override]
    public function hasFailures(): bool
    {
        return false;
    }

    #[Override]
    public function hasLeaked(): bool
    {
        return false;
    }

    #[Override]
    public function hasSlowTests(): bool
    {
        return false;
    }

    #[Override]
    public function hasWarnings(): bool
    {
        return false;
    }

    #[Override]
    public function hasXFailed(): bool
    {
        return false;
    }

    #[Override]
    public function hasXLeaked(): bool
    {
        return false;
    }

    #[Override]
    public function isEmpty(): bool
    {
        return false;
    }

    #[Override]
    public function isNotEmpty(): bool
    {
        return false;
    }

    #[Override]
    public function leaked(): iterable
    {
        yield from [];
    }

    #[Override]
    public function set(string $id, ResultInterface $result): void
    {
        $this->results[$id] = $result;
    }

    #[Override]
    public function slow(): iterable
    {
        yield from [];
    }

    #[Override]
    public function toArray(): array
    {
        return $this->results;
    }

    #[Override]
    public function warned(): iterable
    {
        yield from [];
    }

    #[Override]
    public function xFailed(): iterable
    {
        yield from [];
    }

    #[Override]
    public function xLeaked(): iterable
    {
        yield from [];
    }
}
