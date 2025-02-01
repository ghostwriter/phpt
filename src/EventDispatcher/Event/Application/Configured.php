<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\EventDispatcher\Event\Application;

use Ghostwriter\Phpt\EventDispatcher\Event\EventInterface;

final readonly class Configured implements EventInterface
{
    public function __construct(
        private array $arguments,
    ) {}
}
