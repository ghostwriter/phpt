<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Test\Result;

use Ghostwriter\Phpt\Component\Test\Result\XFailed;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(XFailed::class)]
final class XFailedTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
