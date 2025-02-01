<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Collection;

use Ghostwriter\Phpt\Component\Test\TestCaseInterface;
use Override;

final class TestCasesCollection implements TestCasesCollectionInterface
{
    public static function new(): self
    {
        return new self();
    }

    #[Override]
    public function add(TestCaseInterface $testCase): void {}
}
