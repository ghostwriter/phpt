<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Container\Extension;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\ExtensionInterface;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Configured;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Finished;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Running;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Started;
use Ghostwriter\Phpt\EventDispatcher\Event\EventInterface;
use Ghostwriter\Phpt\EventDispatcher\Event\Test\Result\Broken;
use Ghostwriter\Phpt\EventDispatcher\Event\Test\Result\Failed;
use Ghostwriter\Phpt\EventDispatcher\Event\Test\Result\Leaked;
use Ghostwriter\Phpt\EventDispatcher\Event\Test\Result\Passed;
use Ghostwriter\Phpt\EventDispatcher\Event\Test\Result\Warned;
use Ghostwriter\Phpt\EventDispatcher\Event\Test\Result\XFailed;
use Ghostwriter\Phpt\EventDispatcher\Event\Test\Result\XLeaked;
use Ghostwriter\Phpt\EventDispatcher\Event\Test\Skipped;
use Ghostwriter\Phpt\EventDispatcher\Event\Test\Stopped;
use Ghostwriter\Phpt\EventDispatcher\Event\Test\Terminated;
use Ghostwriter\Phpt\EventDispatcher\Listener;
use Ghostwriter\Phpt\EventDispatcher\Listener\Debug;
use Override;
use Throwable;

/**
 * @implements ExtensionInterface<ListenerProviderInterface>
 */
final readonly class ListenerProviderExtension implements ExtensionInterface
{
    private const array EVENTS = [
        EventInterface::class => [Debug::class],

        // Application events
        Configured::class => [Listener\Application\Configured::class],
        Finished::class => [Listener\Application\Finished::class],
        Running::class => [Listener\Application\Running::class],
        Started::class => [Listener\Application\Started::class],

        // Test events
        Stopped::class => [Listener\Test\Stopped::class],
        Terminated::class => [Listener\Test\Terminated::class],
        Skipped::class => [Listener\Test\Skipped::class],

        // Test result events
        Broken::class => [Listener\Test\Result\Broken::class],
        Failed::class => [Listener\Test\Result\Failed::class],
        Leaked::class => [Listener\Test\Result\Leaked::class],
        Passed::class => [Listener\Test\Result\Passed::class],
        Warned::class => [Listener\Test\Result\Warned::class],
        XFailed::class => [Listener\Test\Result\XFailed::class],
        XLeaked::class => [Listener\Test\Result\XLeaked::class],
    ];

    /**
     *
     * @param ContainerInterface        $container
     * @param ListenerProviderInterface $service
     *
     * @throws Throwable
     *
     * @return ListenerProviderInterface
     *
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): object
    {
        foreach (self::EVENTS as $event => $listeners) {
            foreach ($listeners as $listener) {
                $service->bind($event, $listener);
            }
        }

        return $service;
    }
}
