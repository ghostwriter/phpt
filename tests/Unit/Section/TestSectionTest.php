<?php

declare(strict_types=1);

namespace Tests\Unit\Section;

use Ghostwriter\Phpt\Section\TestSection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestSection::class)]
final class TestSectionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
