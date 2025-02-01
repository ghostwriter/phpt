<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\ExecutionResult;

use Ghostwriter\Phpt\Component\Collection\ResultCollectionInterface;
use Ghostwriter\Phpt\Component\Collection\TestCasesCollectionInterface;

interface ExecutionResultInterface
{
    public function results(): ResultCollectionInterface;

    public function testCases(): TestCasesCollectionInterface;
}
