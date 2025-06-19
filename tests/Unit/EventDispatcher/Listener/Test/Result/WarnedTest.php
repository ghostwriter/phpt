<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Listener\Test\Result;

use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Result\Warned;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Warned::class)]
final class WarnedTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
