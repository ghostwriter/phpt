<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Test\Result;

use Ghostwriter\Phpt\Component\Test\Result\Broken;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Broken::class)]
final class BrokenTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
