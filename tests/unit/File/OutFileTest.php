<?php

declare(strict_types=1);

namespace Tests\Unit\File;

use Ghostwriter\Phpt\File\OutFile;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(OutFile::class)]
final class OutFileTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
