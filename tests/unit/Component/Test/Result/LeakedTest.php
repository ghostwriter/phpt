<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Test\Result;

use Ghostwriter\Phpt\Component\Test\Result\Leaked;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Leaked::class)]
final class LeakedTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
