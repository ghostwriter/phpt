<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Test\TestCase;

use Ghostwriter\Phpt\Component\Test\TestCase\PhptTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PhptTestCase::class)]
final class PhptTestCaseTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
