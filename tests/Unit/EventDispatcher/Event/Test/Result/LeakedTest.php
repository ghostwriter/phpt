<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event\Test\Result;

use Ghostwriter\Phpt\EventDispatcher\Event\Test\Result\Leaked;
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
