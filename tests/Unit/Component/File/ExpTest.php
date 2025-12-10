<?php

declare(strict_types=1);

namespace Tests\Unit\Component\File;

use Ghostwriter\PHPt\Component\File\Exp;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Exp::class)]
final class ExpTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
