<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Test\Case;

use Ghostwriter\PHPt\Component\Test\Case\PHPtCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PHPtCase::class)]
final class PHPtCaseTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
