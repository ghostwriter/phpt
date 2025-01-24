<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Test\Result;

use Ghostwriter\Phpt\Component\Test\Result\XLeaked;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(XLeaked::class)]
final class XLeakedTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
