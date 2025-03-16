<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Extension;

use Ghostwriter\Phpt\Container\Extension\ListenerProviderExtension;
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
