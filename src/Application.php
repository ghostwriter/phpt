<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt;

use Ghostwriter\Phpt\Interface\ApplicationInterface;

use function var_dump;

/** @see \Tests\Unit\ApplicationTest */
final class Application implements ApplicationInterface
{
    public function run(array $arguments = []): int
    {
        var_dump($arguments);

        return 0;
    }

    public static function new(): self
    {
        return new self();
    }
}
