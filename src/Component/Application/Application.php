<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Application;

use Ghostwriter\Container\Container;
use Ghostwriter\EventDispatcher\Interface\EventDispatcherInterface;
use Ghostwriter\Phpt\Container\ServiceProvider;
use Ghostwriter\Phpt\EventDispatcher\Event;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Configured;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Finished;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Running;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Started;
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
use Override;
use Tests\Unit\ApplicationTest;
use Throwable;

/** @see ApplicationTest */
final readonly class Application implements ApplicationInterface
{
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
    ) {}

    /** @throws Throwable */
    public static function new(): self
    {
        $container = Container::getInstance();

        if (! $container->has(ServiceProvider::class)) {
            $container->provide(ServiceProvider::class);
        }

        return $container->get(self::class);
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function run(array $arguments = []): int
    {
        // dump($arguments);
        $this->eventDispatcher->dispatch(new Started());
        $this->eventDispatcher->dispatch(new Configured($arguments));

        // echo 'Running application...';
        $this->eventDispatcher->dispatch(new Running());
        $this->eventDispatcher->dispatch(new Event\Test\Configured());
        $this->eventDispatcher->dispatch(new Event\Test\Started());

        $this->eventDispatcher->dispatch(new Broken());
        $this->eventDispatcher->dispatch(new Failed());
        $this->eventDispatcher->dispatch(new Leaked());
        $this->eventDispatcher->dispatch(new Passed());
        $this->eventDispatcher->dispatch(new Warned());
        $this->eventDispatcher->dispatch(new XFailed());
        $this->eventDispatcher->dispatch(new XLeaked());

        $this->eventDispatcher->dispatch(new Skipped());
        $this->eventDispatcher->dispatch(new Stopped());
        $this->eventDispatcher->dispatch(new Terminated());
        $this->eventDispatcher->dispatch(new Event\Test\Finished());

        $this->eventDispatcher->dispatch(new Finished());

        return 0;
    }
}
