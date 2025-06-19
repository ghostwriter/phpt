<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Container\Interface\ServiceProviderInterface;
use Ghostwriter\Phpt\Container\ServiceProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ServiceProvider::class)]
final class ServiceProviderTest extends AbstractTestCase
{
    public function testImplementsServiceProviderInterface(): void
    {
        self::assertInstanceOf(ServiceProviderInterface::class, new ServiceProvider());
    }
}
