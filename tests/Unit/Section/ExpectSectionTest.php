<?php

declare(strict_types=1);

namespace Tests\Unit\Section;

use Ghostwriter\Phpt\Section\ExpectSection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ExpectSection::class)]
final class ExpectSectionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
