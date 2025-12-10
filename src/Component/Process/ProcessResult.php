<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Process;

final readonly class ProcessResult
{
    public function __construct(
        public string $stdout,
        public string $stderr,
        public int $exitCode,
        public int $elapsedMs,
        public bool $timedOut = false,
    ) {}
}
