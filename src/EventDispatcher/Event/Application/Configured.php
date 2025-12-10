<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\EventDispatcher\Event\Application;

use Ghostwriter\PHPt\EventDispatcher\Event\EventInterface;

final readonly class Configured implements EventInterface
{
    public function __construct(
        private array $arguments,
    ) {}
}
