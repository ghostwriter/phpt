<?php

declare(strict_types=1);

namespace Tests\Unit\Component\ExecutionResult;

use Ghostwriter\Phpt\Component\ExecutionResult\ExecutionResult;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ExecutionResult::class)]
final class ExecutionResultTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
