<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Phpt\PhptCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PhptCase::class)]
final class PhptCaseTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
