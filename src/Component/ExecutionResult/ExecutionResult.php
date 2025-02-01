<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\ExecutionResult;

use Ghostwriter\Phpt\Component\Collection\ResultCollection;
use Ghostwriter\Phpt\Component\Collection\ResultCollectionInterface;
use Ghostwriter\Phpt\Component\Collection\TestCasesCollection;
use Ghostwriter\Phpt\Component\Collection\TestCasesCollectionInterface;
use Override;

final class ExecutionResult implements ExecutionResultInterface
{
    public static function new(): self
    {
        return new self();
    }

    #[Override]
    public function results(): ResultCollectionInterface
    {
        return ResultCollection::new();
    }

    #[Override]
    public function testCases(): TestCasesCollectionInterface
    {
        return TestCasesCollection::new();
    }
}
