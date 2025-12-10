<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Application;

use Generator;
use Ghostwriter\PHPt\Console\Application;
use Ghostwriter\PHPt\Container\Ghostwriter\Config\ConfigurationExtension;
use Ghostwriter\PHPt\Container\Ghostwriter\EventDispatcher\ListenerProviderExtension;
use Ghostwriter\PHPt\Container\PHPtDefinition;
use Ghostwriter\PHPt\EventDispatcher\Event;
use Ghostwriter\PHPt\EventDispatcher\Listener;
use Ghostwriter\PHPt\ExceptionInterface;
use Ghostwriter\PHPt\Interface\Console\ApplicationInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(PHPtDefinition::class)]
#[CoversClass(ConfigurationExtension::class)]
#[CoversClass(Application::class)]
#[CoversClass(Listener\DebugListener::class)]
#[CoversClass(Event\Application\Configured::class)]
#[CoversClass(Event\Application\Finished::class)]
#[CoversClass(Event\Application\Running::class)]
#[CoversClass(Event\Application\Started::class)]
#[CoversClass(Event\Test\Result\Broken::class)]
#[CoversClass(Event\Test\Result\Failed::class)]
#[CoversClass(Event\Test\Result\Leaked::class)]
#[CoversClass(Event\Test\Result\Passed::class)]
#[CoversClass(Event\Test\Result\Warned::class)]
#[CoversClass(Event\Test\Result\XFailed::class)]
#[CoversClass(Event\Test\Result\XLeaked::class)]
#[CoversClass(Event\Test\Skipped::class)]
#[CoversClass(Event\Test\Stopped::class)]
#[CoversClass(Event\Test\Terminated::class)]
#[CoversClass(ListenerProviderExtension::class)]
#[CoversClass(Listener\Application\Configured::class)]
#[CoversClass(Listener\Application\Finished::class)]
#[CoversClass(Listener\Application\Running::class)]
#[CoversClass(Listener\Application\Started::class)]
#[CoversClass(Listener\Test\Result\Broken::class)]
#[CoversClass(Listener\Test\Result\Failed::class)]
#[CoversClass(Listener\Test\Result\Leaked::class)]
#[CoversClass(Listener\Test\Result\Passed::class)]
#[CoversClass(Listener\Test\Result\Warned::class)]
#[CoversClass(Listener\Test\Result\XFailed::class)]
#[CoversClass(Listener\Test\Result\XLeaked::class)]
#[CoversClass(Listener\Test\Skipped::class)]
#[CoversClass(Listener\Test\Stopped::class)]
#[CoversClass(Listener\Test\Terminated::class)]
final class ApplicationTest extends AbstractTestCase
{
    /** @throws Throwable */
    #[DataProvider('provideExampleCases')]
    public function testExample(int $exitCode, array $arguments = []): void
    {
        self::assertSame($exitCode, Application::new()->run($arguments));
    }

    /** @throws Throwable */
    public function testImplementsInterface(): void
    {
        self::assertTrue(is_a(Application::class, ApplicationInterface::class, true));
        self::assertTrue(is_a(ExceptionInterface::class, Throwable::class, true));
    }

    /** @return Generator<array{bool}> */
    public static function provideExampleCases(): iterable
    {
        yield from [
            'true' => [0, ['--help']],
            'false' => [0, ['--version']],
            'argv' => [0, $_SERVER['argv']],
        ];
    }
}
