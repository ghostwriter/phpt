<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\EventDispatcher\Listener\Application;

use Ghostwriter\PHPt\EventDispatcher\Event;
use Ghostwriter\PHPt\EventDispatcher\Listener\ListenerInterface;

final class Configured implements ListenerInterface
{
    public function __invoke(Event\Application\Configured $configured): void {}
}
