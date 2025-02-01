<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Runner;

use Ghostwriter\Phpt\Component\ExecutionResult\ExecutionResult;
use Ghostwriter\Phpt\Component\ExecutionResult\ExecutionResultInterface;
use Override;

final class Runner implements RunnerInterface
{
    #[Override]
    public function run(): ExecutionResultInterface
    {
        return ExecutionResult::new();
    }
}
