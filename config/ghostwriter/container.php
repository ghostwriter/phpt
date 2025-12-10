<?php

declare(strict_types=1);

use Ghostwriter\Container\Interface\Service\DefinitionInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\EventDispatcher\ListenerProvider;
use Ghostwriter\PHPt\Console\Application;
use Ghostwriter\PHPt\Container\Ghostwriter\EventDispatcher\ListenerProviderExtension;
use Ghostwriter\PHPt\Interface\Console\ApplicationInterface;
use PhpParser\PrettyPrinter;
use PhpParser\PrettyPrinter\Standard;

/**
 * @return array{
 *     'alias': array<class-string,class-string>,
 *     'define': array<class-string,class-string<DefinitionInterface>>,
 *     'extend': array<class-string,list<class-string<ExtensionInterface>>>,
 *     'factory': array<class-string,class-string<FactoryInterface>>
 * }
 */
return [
    'alias' => [
        ApplicationInterface::class => Application::class,
        PrettyPrinter::class => Standard::class,
    ],
    'define' => [],
    'extend' => [
        ListenerProvider::class => [ListenerProviderExtension::class],
    ],
    'factory' => [],
];
