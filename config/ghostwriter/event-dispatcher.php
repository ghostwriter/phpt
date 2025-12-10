<?php

declare(strict_types=1);

use Ghostwriter\PHPt\EventDispatcher\Event;
use Ghostwriter\PHPt\EventDispatcher\Listener;
use Ghostwriter\PHPt\EventDispatcher\Listener\DebugListener;

return [
    // event class => [ listener class, ...]
    'listen' => [
        'object' => [DebugListener::class],

        // Application events
        Event\Application\Configured::class => [Listener\Application\Configured::class],
        Event\Application\Finished::class => [Listener\Application\Finished::class],
        Event\Application\Running::class => [Listener\Application\Running::class],
        Event\Application\Started::class => [Listener\Application\Started::class],

        // Test events
        Event\Test\Stopped::class => [Listener\Test\Stopped::class],
        Event\Test\Terminated::class => [Listener\Test\Terminated::class],
        Event\Test\Skipped::class => [Listener\Test\Skipped::class],

        // Test result events
        Event\Test\Result\Broken::class => [Listener\Test\Result\Broken::class],
        Event\Test\Result\Failed::class => [Listener\Test\Result\Failed::class],
        Event\Test\Result\Leaked::class => [Listener\Test\Result\Leaked::class],
        Event\Test\Result\Passed::class => [Listener\Test\Result\Passed::class],
        Event\Test\Result\Warned::class => [Listener\Test\Result\Warned::class],
        Event\Test\Result\XFailed::class => [Listener\Test\Result\XFailed::class],
        Event\Test\Result\XLeaked::class => [Listener\Test\Result\XLeaked::class],
    ],
];
