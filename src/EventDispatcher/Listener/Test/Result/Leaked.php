<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\EventDispatcher\Listener\Test\Result;

use Ghostwriter\PHPt\EventDispatcher\Event;
use Ghostwriter\PHPt\EventDispatcher\Listener\ListenerInterface;

final class Leaked implements ListenerInterface
{
    public function __invoke(Event\Test\Result\Leaked $leaked): void {}
}
