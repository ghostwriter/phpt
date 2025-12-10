<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Runner;

use Ghostwriter\PHPt\Component\ExecutionResult\ExecutionResultInterface;

interface RunnerInterface
{
    public function run(): ExecutionResultInterface;
}
