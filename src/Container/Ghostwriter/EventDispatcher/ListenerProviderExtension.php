<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Container\Ghostwriter\EventDispatcher;

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Override;
use Throwable;

use function assert;

/**
 * @implements ExtensionInterface<ListenerProviderInterface>
 */
final readonly class ListenerProviderExtension implements ExtensionInterface
{
    /**
     * @param ListenerProviderInterface $service
     *
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): void
    {
        assert($service instanceof ListenerProviderInterface);

        $configuration = $container->get(ConfigurationInterface::class);

        foreach ($configuration->get('ghostwriter.event-dispatcher.listen', []) as $event => $listeners) {
            foreach ($listeners as $listener) {
                $service->listen($event, $listener);
            }
        }
    }
}
