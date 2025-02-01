<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\EventDispatcher\ListenerProvider;
use Override;
use Throwable;

/**
 * @implements FactoryInterface<ListenerProviderInterface>
 */
final readonly class ListenerProviderFactory implements FactoryInterface
{
    /**
     * @throws Throwable
     *
     * @return ListenerProviderInterface
     */
    #[Override]
    public function __invoke(ContainerInterface $container): object
    {
        return new ListenerProvider($container);
    }
}
