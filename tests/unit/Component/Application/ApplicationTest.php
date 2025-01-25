<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Application;

use Generator;
use Ghostwriter\Phpt\Component\Application\Application;
use Ghostwriter\Phpt\Component\Application\ApplicationInterface;
use Ghostwriter\Phpt\Component\Configuration\Configuration;
use Ghostwriter\Phpt\Container\Extension\ListenerProviderExtension;
use Ghostwriter\Phpt\Container\Factory\DebugFactory;
use Ghostwriter\Phpt\Container\Factory\ListenerProviderFactory;
use Ghostwriter\Phpt\Container\ServiceProvider;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Configured;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Finished;
use Ghostwriter\Phpt\EventDispatcher\Event\Application\Started;
use Ghostwriter\Phpt\EventDispatcher\Listener;
use Ghostwriter\Phpt\EventDispatcher\Listener\Application\Running;
use Ghostwriter\Phpt\EventDispatcher\Listener\Debug;
use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\Broken;
use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\Failed;
use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\Leaked;
use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\Passed;
use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\Warned;
use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\XFailed;
use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\XLeaked;
use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Skipped;
use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Stopped;
use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Terminated;
use Ghostwriter\Phpt\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(Application::class)]
#[CoversClass(Configuration::class)]
#[CoversClass(Configured::class)]
#[CoversClass(Debug::class)]
#[CoversClass(DebugFactory::class)]
#[CoversClass(Finished::class)]
#[CoversClass(ListenerProviderExtension::class)]
#[CoversClass(ListenerProviderFactory::class)]
#[CoversClass(Listener\Application\Configured::class)]
#[CoversClass(Listener\Application\Finished::class)]
#[CoversClass(Running::class)]
#[CoversClass(Listener\Application\Started::class)]
#[CoversClass(Broken::class)]
#[CoversClass(Failed::class)]
#[CoversClass(Leaked::class)]
#[CoversClass(Passed::class)]
#[CoversClass(Warned::class)]
#[CoversClass(XFailed::class)]
#[CoversClass(XLeaked::class)]
#[CoversClass(ServiceProvider::class)]
#[CoversClass(Skipped::class)]
#[CoversClass(Started::class)]
#[CoversClass(Stopped::class)]
#[CoversClass(Terminated::class)]
final class ApplicationTest extends AbstractTestCase
{
    /**
     * @throws Throwable
     */
    #[DataProvider('dataProvider')]
    public function testExample(int $exitCode, array $arguments = []): void
    {
        self::assertSame($exitCode, Application::new()->run($arguments));
    }

    /**
     * @throws Throwable
     */
    public function testImplementsInterface(): void
    {
        self::assertTrue(is_a(Application::class, ApplicationInterface::class, true));
        self::assertTrue(is_a(ExceptionInterface::class, Throwable::class, true));
    }

    /**
     * @return Generator<array{bool}>
     */
    public static function dataProvider(): Generator
    {
        yield from [
            'true' => [0, ['--help']],
            'false' => [0, ['--version']],
            'argv' => [0, $_SERVER['argv']],
        ];
    }
}
