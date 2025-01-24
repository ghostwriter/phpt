<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Test\Result;

use Ghostwriter\Phpt\Component\Test\Result\Failed;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Failed::class)]
final class FailedTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
