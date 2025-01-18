<?php

declare(strict_types=1);

namespace Tests\Unit;

use Generator;
use Ghostwriter\Phpt\Application;
use Ghostwriter\Phpt\Interface\ApplicationInterface;
use Ghostwriter\Phpt\Interface\ExceptionInterface;
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
    public function testExample(bool $value): void
    {
        self::assertSame($value, $value);

        self::assertSame(0, Application::new()->run());
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
            'true' => [true],
            'false' => [false],
        ];
    }
}
