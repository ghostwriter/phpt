<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Runner;

use Ghostwriter\Phpt\Component\ExecutionResult\ExecutionResultInterface;

interface RunnerInterface
{
    public function run(): ExecutionResultInterface;
}
