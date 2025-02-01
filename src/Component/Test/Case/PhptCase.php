<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Test\Case;

use Ghostwriter\Phpt\Component\Section\Credit;
use Ghostwriter\Phpt\Component\Section\Description;
use Ghostwriter\Phpt\Component\Section\Expect;
use Ghostwriter\Phpt\Component\Section\File;
use Ghostwriter\Phpt\Component\Section\SkipIf;
use Ghostwriter\Phpt\Component\Section\Test;
use Ghostwriter\Phpt\Component\Test\TestCase\PhptTestCaseInterface;
use WeakMap;

final readonly class PhptCase implements PhptCaseInterface
{
    public function __construct(
        private PhptTestCaseInterface $phptTestCase,
        private WeakMap $weakMap,
    ) {
        [Credit::new(), Description::new(), Expect::new(), File::new(), SkipIf::new(), Test::new()];
    }

    public static function new(): self
    {
        return new self(
            //            PhptCaseInterface::class
        );
    }

    public function testCase(): PhptTestCaseInterface
    {
        return $this->phptTestCase;
    }
}
