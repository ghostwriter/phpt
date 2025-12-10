<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\PHPt\Exception\ShouldNotHappenException;
use Ghostwriter\PHPt\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ShouldNotHappenException::class)]
final class ShouldNotHappenExceptionTest extends AbstractTestCase
{
    public function testImplementsExceptionInterface(): void
    {
        self::assertInstanceOf(ExceptionInterface::class, new ShouldNotHappenException());
    }
}
