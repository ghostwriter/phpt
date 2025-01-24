<?php

declare(strict_types=1);

namespace Tests\Unit\File;

use Ghostwriter\Phpt\Component\File\PhpFile;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PhpFile::class)]
final class PhpFileTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
