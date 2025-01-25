<?php

declare(strict_types=1);

namespace Tests\Unit\Component\File;

use Ghostwriter\Phpt\Component\File\Diff;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Diff::class)]
final class DiffTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
