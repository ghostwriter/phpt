<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\ExecutionResult;

use Ghostwriter\PHPt\Component\Collection\ResultCollectionInterface;
use Ghostwriter\PHPt\Component\Collection\TestCaseCollectionInterface;

interface ExecutionResultInterface
{
    public function resultCollection(): ResultCollectionInterface;

    public function testCaseCollection(): TestCaseCollectionInterface;
    //    public function results(): ResultCollectionInterface;
    //
    //    public function testCases(): TestCaseCollectionInterface;
}
