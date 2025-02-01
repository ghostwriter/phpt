<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event\Application;

use Ghostwriter\Phpt\EventDispatcher\Event\Application\Running;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Running::class)]
final class RunningTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
