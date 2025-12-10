<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\ExecutionResult;

use Ghostwriter\PHPt\Component\Collection\ResultCollection;
use Ghostwriter\PHPt\Component\Collection\ResultCollectionInterface;
use Ghostwriter\PHPt\Component\Collection\TestCaseCollection;
use Ghostwriter\PHPt\Component\Collection\TestCaseCollectionInterface;
use Override;

final readonly class ExecutionResult implements ExecutionResultInterface
{
    public function __construct(
        private ResultCollectionInterface $resultCollection,
        private TestCaseCollectionInterface $testCaseCollection,
    ) {}

    public static function new(
        ?ResultCollectionInterface $resultCollection = null,
        ?TestCaseCollectionInterface $testCaseCollection = null,
    ): self {
        return new self(
            $resultCollection ?? ResultCollection::new(),
            $testCaseCollection ?? TestCaseCollection::new(),
        );
    }

    #[Override]
    public function resultCollection(): ResultCollectionInterface
    {
        return $this->resultCollection;
    }

    #[Override]
    public function testCaseCollection(): TestCaseCollectionInterface
    {
        return $this->testCaseCollection;
    }
}
