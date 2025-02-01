<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Test\Result;

use Ghostwriter\Phpt\Component\Test\ResultInterface;
use Ghostwriter\Phpt\Component\Test\TestCaseInterface;

interface LeakedInterface extends ResultInterface
{
    public function testCase(): TestCaseInterface;
}
