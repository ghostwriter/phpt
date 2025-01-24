<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Collection;

use Ghostwriter\Phpt\Component\Test\TestCaseInterface;

interface TestCasesCollectionInterface
{
    public function add(TestCaseInterface $testCase): void;
}
