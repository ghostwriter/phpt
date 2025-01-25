<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\EventDispatcher\Listener\Test;

use Ghostwriter\Phpt\EventDispatcher\Event;
use Ghostwriter\Phpt\EventDispatcher\Listener\ListenerInterface;

final class Stopped implements ListenerInterface
{
    public function __invoke(Event\Test\Stopped $stopped): void {}
}
