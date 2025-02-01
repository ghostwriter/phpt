<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Phpt\Component\Configuration\ConfigurationInterface;
use Ghostwriter\Phpt\EventDispatcher\Listener\Debug;
use Override;
use Throwable;

use function getopt;

/**
 * @implements FactoryInterface<ListenerProviderInterface>
 */
final readonly class DebugFactory implements FactoryInterface
{
    /**
     * @throws Throwable
     *
     * @return ListenerProviderInterface
     */
    #[Override]
    public function __invoke(ContainerInterface $container): object
    {
        // check if --debug flag is set from command line
        $options = getopt('', ['debug']);

        // check if debug is enabled in configuration
        $enabled = (bool) $container->get(ConfigurationInterface::class)
            ->get('event.debug', $options['debug'] ?? false);

        return Debug::new($enabled);
    }
}
