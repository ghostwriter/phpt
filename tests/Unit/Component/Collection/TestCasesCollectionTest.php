<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Collection;

use Ghostwriter\PHPt\Component\Collection\TestCaseCollection;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestCaseCollection::class)]
final class TestCasesCollectionTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
