<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Test\Result;

use Ghostwriter\PHPt\Component\Test\ResultInterface;
use Ghostwriter\PHPt\Component\Test\TestCaseInterface;

interface WarnedInterface extends ResultInterface
{
    public function testCase(): TestCaseInterface;
}
