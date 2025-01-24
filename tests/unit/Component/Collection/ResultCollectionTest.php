<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Collection;

use Ghostwriter\Phpt\Component\Collection\ResultCollection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ResultCollection::class)]
final class ResultCollectionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
