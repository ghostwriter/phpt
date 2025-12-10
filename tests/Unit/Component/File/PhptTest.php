<?php

declare(strict_types=1);

namespace Tests\Unit\Component\File;

use Ghostwriter\PHPt\Component\File\PHPt;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PHPt::class)]
final class PHPtTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
