<?php

declare(strict_types=1);

namespace Tests\Unit\Section;

use Ghostwriter\Phpt\Section\CreditSection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CreditSection::class)]
final class CreditSectionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
