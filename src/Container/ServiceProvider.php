<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Container;

use Ghostwriter\Config\Config;
use Ghostwriter\Config\ConfigInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\ServiceProviderInterface;
use Ghostwriter\EventDispatcher\EventDispatcher;
use Ghostwriter\EventDispatcher\Interface\EventDispatcherInterface;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\EventDispatcher\ListenerProvider;
use Ghostwriter\Filesystem\Filesystem;
use Ghostwriter\Filesystem\Interface\FilesystemInterface;
use Ghostwriter\Json\Interface\JsonInterface;
use Ghostwriter\Json\Json;
use Ghostwriter\Phpt\Component\Application\Application;
use Ghostwriter\Phpt\Component\Application\ApplicationInterface;
use Ghostwriter\Phpt\Component\Configuration\Configuration;
use Ghostwriter\Phpt\Component\Configuration\ConfigurationInterface;
use Ghostwriter\Phpt\Container\Extension\ListenerProviderExtension;
use Ghostwriter\Phpt\Container\Factory\DebugFactory;
use Ghostwriter\Phpt\Container\Factory\ListenerProviderFactory;
use Ghostwriter\Phpt\EventDispatcher\Listener\Debug;
use Override;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

final readonly class ServiceProvider implements ServiceProviderInterface
{
    private const array ALIASES = [
        Application::class => ApplicationInterface::class,
        ArgvInput::class => InputInterface::class,
        ConsoleOutput::class => OutputInterface::class,
        EventDispatcher::class => EventDispatcherInterface::class,
        Filesystem::class => FilesystemInterface::class,
        ListenerProvider::class => ListenerProviderInterface::class,
        Json::class => JsonInterface::class,
        Configuration::class => ConfigurationInterface::class,
        Config::class => ConfigInterface::class,
    ];

    private const array EXTENSIONS = [
        ListenerProvider::class => ListenerProviderExtension::class,
    ];

    private const array FACTORIES = [
        ListenerProvider::class => ListenerProviderFactory::class,
        Debug::class => DebugFactory::class,
    ];

    /**
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container): void
    {
        foreach (self::ALIASES as $service => $alias) {
            $container->alias($service, $alias);
        }

        foreach (self::EXTENSIONS as $service => $extension) {
            $container->extend($service, $extension);
        }

        foreach (self::FACTORIES as $service => $factory) {
            $container->factory($service, $factory);
        }
    }
}
