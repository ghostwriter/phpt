<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Section;

use Ghostwriter\PHPt\Component\Section\Description;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Description::class)]
final class DescriptionTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
