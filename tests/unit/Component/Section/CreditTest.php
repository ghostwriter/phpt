<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Section;

use Ghostwriter\Phpt\Component\Section\Credit;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Credit::class)]
final class CreditTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
