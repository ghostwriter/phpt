<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\EventDispatcher\Listener;

use Ghostwriter\Phpt\EventDispatcher\Event\EventInterface;

use function dump;

final readonly class Debug implements ListenerInterface
{
    private function __construct(
        private bool $enabled,
    ) {}

    public static function new(bool $enabled): self
    {
        return new self($enabled);
    }

    public function __invoke(EventInterface $event): void
    {
        if (! $this->enabled) {
            return;
        }

        dump([
            $event::class => $event,
        ]);
    }
}

// final class Warning {}
// final class Aborted {}
// final class Bootstrapped {}
// final class Deprecated {}
// final class Error {}
// final class Errored {}
// final class Failed {}
// final class Filtered {}
// final class Initialized {}
// final class Loaded {}
// final class Notice {}
// final class Prepared {}
// final class Sorted {}
