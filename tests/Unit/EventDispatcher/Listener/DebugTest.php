<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Listener;

use Ghostwriter\Phpt\EventDispatcher\Listener\Debug;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Debug::class)]
final class DebugTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
