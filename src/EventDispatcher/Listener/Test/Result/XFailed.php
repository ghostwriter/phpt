<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result;

use Ghostwriter\Phpt\EventDispatcher\Event;
use Ghostwriter\Phpt\EventDispatcher\Listener\ListenerInterface;

final class XFailed implements ListenerInterface
{
    public function __invoke(Event\Test\Result\XFailed $xFailed): void {}
}
