<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Runner;

final readonly class RunnerOptions
{
    /** @param array<string> $files */
    public function __construct(
        public array $files = ['tests'],
        public ?string $phpBinary = PHP_BINARY,
        public int $timeoutSeconds = 60,
        public bool $noClean = false,
        public bool $verbose = false,
        public array $show = [],
        public ?string $failedListFile = null,
        public bool $appendFailed = false,
        public array $extraIni = [],
    ) {}
}
