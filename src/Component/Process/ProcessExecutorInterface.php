<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Process;

interface ProcessExecutorInterface
{
    public function execute(ProcessRequest $request): ProcessResult;
}
