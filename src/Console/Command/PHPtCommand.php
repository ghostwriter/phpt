<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Console\Command;

use Ghostwriter\EventDispatcher\Interface\EventDispatcherInterface;
use Ghostwriter\PHPt\Component\Runner\RunnerOptions;
use Ghostwriter\PHPt\Component\Runner\Runner;
use Ghostwriter\PHPt\EventDispatcher\Event;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/** @see PHPtCommandTest */
#[AsCommand(name: 'phpt', description: 'Run PHPt tests.')]
final class PHPtCommand extends Command
{
    public function __construct(
        private readonly EventDispatcherInterface $eventDispatcher,
        private readonly Runner $runner,
    ) {
        parent::__construct();
    }

    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);

        $files = $input->getArgument('files') ?? ['tests'];
        $php = $input->getOption('php') ?? PHP_BINARY;
        $timeout = (int) ($input->getOption('timeout') ?? 60);
        $noClean = (bool) $input->getOption('no-clean');
        $verbose = (bool) $input->getOption('verbose');

        $options = new RunnerOptions(
            files: is_array($files) ? $files : [$files],
            phpBinary: $php,
            timeoutSeconds: $timeout,
            noClean: $noClean,
            verbose: $verbose,
        );

        // For compatibility we'll dispatch configured event with arguments
        $this->eventDispatcher->dispatch(new Event\Application\Configured($input->getArguments()));

        $exitCode = 0;
        try {
            $exitCode = $this->runner->run() ? 0 : 1;
        } catch (Throwable $e) {
            $output->writeln('<error>' . $e->getMessage() . '</error>');
            return self::FAILURE;
        }

        return $exitCode === 0 ? self::SUCCESS : self::FAILURE;
    }

    /** @throws Throwable */
    #[Override]
    protected function configure(): void
    {
        $this->addArgument(
            name: 'files',
            mode: InputArgument::IS_ARRAY | InputArgument::OPTIONAL,
            description: 'The PHPt test files to execute.',
            default: ['tests']
        );
        $this->addOption(
            'php',
            null,
            InputOption::VALUE_REQUIRED,
            'PHP binary to use',
            PHP_BINARY
        );
        $this->addOption(
            'timeout',
            null,
            InputOption::VALUE_REQUIRED,
            'Timeout per test in seconds',
            '60'
        );
        $this->addOption(
            'no-clean',
            null,
            InputOption::VALUE_NONE,
            'Do not execute clean sections',
        );
        $this->addOption(
            'verbose',
            'v',
            InputOption::VALUE_NONE,
            'Enable verbose output',
        );

        parent::configure();
    }
}
