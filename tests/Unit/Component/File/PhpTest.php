<?php

declare(strict_types=1);

namespace Tests\Unit\Component\File;

use Ghostwriter\PHPt\Component\File\Php;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php::class)]
final class PhpTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
