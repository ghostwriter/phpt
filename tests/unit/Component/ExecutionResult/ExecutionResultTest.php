<?php

declare(strict_types=1);

namespace Tests\Unit\Component\ExecutionResult;

use Ghostwriter\Phpt\Component\ExecutionResult\ExecutionResult;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ExecutionResult::class)]
final class ExecutionResultTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
