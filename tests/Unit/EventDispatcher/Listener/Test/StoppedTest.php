<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Listener\Test;

use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Stopped;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Stopped::class)]
final class StoppedTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
