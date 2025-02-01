<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\Phpt\Exception\NotImplementedYetException;
use Ghostwriter\Phpt\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(NotImplementedYetException::class)]
final class NotImplementedYetExceptionTest extends AbstractTestCase
{
    public function testImplementsExceptionInterface(): void
    {
        self::assertInstanceOf(ExceptionInterface::class, new NotImplementedYetException());
    }
}
