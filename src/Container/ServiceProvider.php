<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Container;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\ServiceProviderInterface;

final readonly class ServiceProvider implements ServiceProviderInterface
{
    public function __invoke(ContainerInterface $container): void
    {
    }
}
