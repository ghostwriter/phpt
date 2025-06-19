<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Listener\Application;

use Ghostwriter\Phpt\EventDispatcher\Listener\Application\Started;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Started::class)]
final class StartedTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
