<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Test\Case;

use Ghostwriter\Phpt\Component\Test\Case\PhptCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PhptCase::class)]
final class PhptCaseTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
