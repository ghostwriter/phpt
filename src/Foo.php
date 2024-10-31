<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt;

use Ghostwriter\Phpt\Interface\FooInterface;

/** @see FooTest */
final class Foo implements FooInterface
{
    public function __construct()
    {
    }

    public function run(array $argv): int
    {
        return 0;
    }

    public function test(): bool
    {
        return true;
    }

    public static function new(): self
    {
        return new self();
    }
}
