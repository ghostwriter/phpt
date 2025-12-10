<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\EventDispatcher\Listener\Test;

use Ghostwriter\PHPt\EventDispatcher\Event;
use Ghostwriter\PHPt\EventDispatcher\Listener\ListenerInterface;

final class Skipped implements ListenerInterface
{
    public function __invoke(Event\Test\Skipped $skipped): void {}
}
