<?php

declare(strict_types=1);

namespace Tests\Unit\Section;

use Ghostwriter\Phpt\Section\SkipIfSection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SkipIfSection::class)]
final class SkipIfSectionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
