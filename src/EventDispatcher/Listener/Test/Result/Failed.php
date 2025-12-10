<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\EventDispatcher\Listener\Test\Result;

use Ghostwriter\PHPt\EventDispatcher\Event;
use Ghostwriter\PHPt\EventDispatcher\Listener\ListenerInterface;

final class Failed implements ListenerInterface
{
    public function __invoke(Event\Test\Result\Failed $failed): void {}
}
