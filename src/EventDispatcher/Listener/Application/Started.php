<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\EventDispatcher\Listener\Application;

use Ghostwriter\Phpt\EventDispatcher\Event;
use Ghostwriter\Phpt\EventDispatcher\Listener\ListenerInterface;

final class Started implements ListenerInterface
{
    public function __invoke(Event\Application\Started $started): void {}
}
