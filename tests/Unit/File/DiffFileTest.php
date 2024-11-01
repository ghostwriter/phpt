<?php

declare(strict_types=1);

namespace Tests\Unit\File;

use Ghostwriter\Phpt\File\DiffFile;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DiffFile::class)]
final class DiffFileTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
