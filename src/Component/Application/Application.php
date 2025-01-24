<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Application;

use Override;
use Tests\Unit\ApplicationTest;

/** @see ApplicationTest */
final class Application implements ApplicationInterface
{
    public static function new(): self
    {
        return new self();
    }

    #[Override]
    public function run(array $arguments = []): int
    {
        // dump($arguments);

        // echo 'Running application...';

        return 0;
    }
}
