<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\Phpt\Exception\NotImplementedYetException;
use Ghostwriter\Phpt\Interface\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(NotImplementedYetException::class)]
final class NotImplementedYetExceptionTest extends TestCase
{
    public function testImplementsExceptionInterface(): void
    {
        self::assertInstanceOf(ExceptionInterface::class, new NotImplementedYetException());
    }
}
