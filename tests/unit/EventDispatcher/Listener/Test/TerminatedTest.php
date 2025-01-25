<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Listener\Test;

use Ghostwriter\Phpt\EventDispatcher\Listener\Test\Terminated;
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
