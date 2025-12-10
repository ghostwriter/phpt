<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Test\TestCase;

use Ghostwriter\PHPt\Component\Test\TestCase\PHPtTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PHPtTestCase::class)]
final class PHPtTestCaseTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
