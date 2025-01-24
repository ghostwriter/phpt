<?php

declare(strict_types=1);

namespace Tests\Unit;

use Generator;
use Ghostwriter\Phpt\Component\Application\Application;
use Ghostwriter\Phpt\Component\Application\ApplicationInterface;
use Ghostwriter\Phpt\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Throwable;

use function is_a;

#[CoversClass(Application::class)]
final class ApplicationTest extends TestCase
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
