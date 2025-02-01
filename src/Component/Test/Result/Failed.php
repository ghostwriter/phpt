<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Test\Result;

use Ghostwriter\Phpt\Component\Test\TestCaseInterface;

final readonly class Failed implements FailedInterface
{
    public function __construct(
        private TestCaseInterface $testCase,
        private string $message,
        private string $output,
        private string $diff,
    ) {}

    public function diff(): string
    {
        return $this->diff;
    }

    public function message(): string
    {
        return $this->message;
    }

    public function output(): string
    {
        return $this->output;
    }

    public function testCase(): TestCaseInterface
    {
        return $this->testCase;
    }
}
