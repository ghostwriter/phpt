<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Listener\Test\Result;

use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\XLeaked;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(XLeaked::class)]
final class XLeakedTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
