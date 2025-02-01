<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event\Test;

use Ghostwriter\Phpt\EventDispatcher\Event\Test\Stopped;
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
