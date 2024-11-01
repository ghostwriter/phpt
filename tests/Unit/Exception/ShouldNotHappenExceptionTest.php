<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\Phpt\Exception\ShouldNotHappenException;
use Ghostwriter\Phpt\Interface\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ShouldNotHappenException::class)]
final class ShouldNotHappenExceptionTest extends TestCase
{
    public function testImplementsExceptionInterface(): void
    {
        self::assertInstanceOf(ExceptionInterface::class, new ShouldNotHappenException());
    }
}
