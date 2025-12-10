<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\EventDispatcher\Listener;

use function dump;

final readonly class DebugListener
{
    public function __invoke(object $event): void
    {
        dump([
            'event' => $event::class,
        ]);
    }
}
