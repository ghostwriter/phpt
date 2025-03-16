<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Listener\Test\Result;

use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\Passed;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Passed::class)]
final class PassedTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
