<?php

declare(strict_types=1);

namespace Tests\Unit\File;

use Ghostwriter\Phpt\Component\File\ShFile;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ShFile::class)]
final class ShFileTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
