<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event\Test;

use Ghostwriter\Phpt\EventDispatcher\Event\Test\Skipped;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Skipped::class)]
final class SkippedTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
