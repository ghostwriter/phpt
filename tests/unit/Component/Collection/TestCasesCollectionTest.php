<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Collection;

use Ghostwriter\Phpt\Component\Collection\TestCasesCollection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestCasesCollection::class)]
final class TestCasesCollectionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
