<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\Phpt\Exception\ShouldNotHappenException;
use Ghostwriter\Phpt\ExceptionInterface;
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
