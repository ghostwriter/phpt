<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Section;

use Ghostwriter\Phpt\Component\Section\FileSection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FileSection::class)]
final class FileSectionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
