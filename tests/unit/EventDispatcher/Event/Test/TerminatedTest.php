<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event\Test;

use Ghostwriter\Phpt\EventDispatcher\Event\Test\Terminated;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Terminated::class)]
final class TerminatedTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
