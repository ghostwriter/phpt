<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result;

use Ghostwriter\Phpt\EventDispatcher\Event;
use Ghostwriter\Phpt\EventDispatcher\Listener\ListenerInterface;

final class Failed implements ListenerInterface
{
    public function __invoke(Event\Test\Result\Failed $failed): void {}
}
