<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Listener\Test\Result;

use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\Broken;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Broken::class)]
final class BrokenTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
