<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Ghostwriter\EventDispatcher;

use Ghostwriter\PHPt\Container\Ghostwriter\EventDispatcher\ListenerProviderExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ListenerProviderExtension::class)]
final class ListenerProviderExtensionTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
