<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Test\Result;

use Ghostwriter\Phpt\Component\Test\Result\Warned;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Warned::class)]
final class WarnedTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
