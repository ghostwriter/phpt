<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result;

use Ghostwriter\Phpt\EventDispatcher\Event;
use Ghostwriter\Phpt\EventDispatcher\Listener\ListenerInterface;

final class Broken implements ListenerInterface
{
    public function __invoke(Event\Test\Result\Broken $broken): void {}
}
