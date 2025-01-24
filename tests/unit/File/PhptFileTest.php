<?php

declare(strict_types=1);

namespace Tests\Unit\File;

use Ghostwriter\Phpt\Component\File\PhptFile;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PhptFile::class)]
final class PhptFileTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
