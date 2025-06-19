<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event\Test;

use Ghostwriter\Phpt\EventDispatcher\Event\Test\Finished;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Finished::class)]
final class FinishedTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
