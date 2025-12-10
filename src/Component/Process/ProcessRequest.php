<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Process;

final readonly class ProcessRequest
{
    /** @param array<string> $args */
    public function __construct(
        public string $binary,
        public array $args = [],
        public array $env = [],
        public ?string $cwd = null,
        public ?string $stdin = null,
        public ?int $timeoutSeconds = null,
        public bool $captureStdErr = true,
    ) {}
}
