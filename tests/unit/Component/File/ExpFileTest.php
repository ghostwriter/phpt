<?php

declare(strict_types=1);

namespace Tests\Unit\Component\File;

use Ghostwriter\Phpt\Component\File\ExpFile;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ExpFile::class)]
final class ExpFileTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
