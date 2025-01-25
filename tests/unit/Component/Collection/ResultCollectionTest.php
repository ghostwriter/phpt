<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Collection;

use Ghostwriter\Phpt\Component\Collection\ResultCollection;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ResultCollection::class)]
final class ResultCollectionTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
