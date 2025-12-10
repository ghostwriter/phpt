<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Console;

use Ghostwriter\Container\Container;
use Ghostwriter\PHPt\Interface\Console\ApplicationInterface;
use InvalidArgumentException;
use Override;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Throwable;

use function array_key_exists;

/** @see ApplicationTest */
final readonly class Application implements ApplicationInterface
{
    public function __construct(
        private \Symfony\Component\Console\Application $symfonyApplication,
    ) {}

    /** @throws Throwable */
    public static function new(): self
    {
        return Container::getInstance()->get(self::class);
    }

    /**
     * execute('foo:bar', ['foo' => 'bar', '--optional' => 'foobar', '--flag' => true]);.
     *
     * @throws Throwable
     */
    #[Override]
    public function execute(string $command, array $arguments = []): int
    {
        if (array_key_exists('command', $arguments)) {
            throw new InvalidArgumentException('The "command" key is reserved and cannot be used in $arguments.');
        }
        $arguments['command'] = $command;

        return $this->symfonyApplication->run(new ArrayInput($arguments), new ConsoleOutput());
    }

    /** @throws Throwable */
    #[Override]
    public function run(array $arguments = []): int
    {
        return $this->symfonyApplication->run(new ArgvInput($arguments), new ConsoleOutput());
    }
}
