<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Section;

use Ghostwriter\Phpt\Component\Section\Expect;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Expect::class)]
final class ExpectTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
