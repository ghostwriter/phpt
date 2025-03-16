<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event\Application;

use Ghostwriter\Phpt\EventDispatcher\Event\Application\Started;
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
