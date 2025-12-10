<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Test\Result;

use Ghostwriter\PHPt\Component\Test\TestCaseInterface;

final readonly class XFailed implements XFailedInterface
{
    public function __construct(
        private TestCaseInterface $testCase
    ) {}

    public function testCase(): TestCaseInterface
    {
        return $this->testCase;
    }
}
