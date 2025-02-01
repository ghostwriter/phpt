<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Test\Result;

use Ghostwriter\Phpt\Component\Test\TestCaseInterface;

final readonly class Broken implements BrokenInterface
{
    public function __construct(
        private TestCaseInterface $testCase
    ) {}

    public function testCase(): TestCaseInterface
    {
        return $this->testCase;
    }
}
