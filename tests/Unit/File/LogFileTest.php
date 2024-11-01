<?php

declare(strict_types=1);

namespace Tests\Unit\File;

use Ghostwriter\Phpt\File\LogFile;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(LogFile::class)]
final class LogFileTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
