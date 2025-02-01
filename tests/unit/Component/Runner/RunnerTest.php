<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Runner;

use Ghostwriter\Phpt\Component\Runner\Runner;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Runner::class)]
final class RunnerTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
