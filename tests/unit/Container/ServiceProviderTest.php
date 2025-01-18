<?php

declare(strict_types=1);

namespace Tests\Unit\Container\ServiceProvider;

use Ghostwriter\Container\Interface\ServiceProviderInterface;
use Ghostwriter\Phpt\Container\ServiceProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ServiceProvider::class)]
final class ServiceProviderTest extends TestCase
{
    public function testImplementsServiceProviderInterface(): void
    {
        self::assertInstanceOf(ServiceProviderInterface::class, new ServiceProvider());
    }
}
