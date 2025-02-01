<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event\Application;

use Ghostwriter\Phpt\EventDispatcher\Event\Application\Configured;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Configured::class)]
final class ConfiguredTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
