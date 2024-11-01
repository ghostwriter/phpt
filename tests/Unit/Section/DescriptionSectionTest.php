<?php

declare(strict_types=1);

namespace Tests\Unit\Section;

use Ghostwriter\Phpt\Section\DescriptionSection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DescriptionSection::class)]
final class DescriptionSectionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
