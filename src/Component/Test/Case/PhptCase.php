<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Test\Case;

use Ghostwriter\PHPt\Component\Section\Credit;
use Ghostwriter\PHPt\Component\Section\Description;
use Ghostwriter\PHPt\Component\Section\Expect;
use Ghostwriter\PHPt\Component\Section\File;
use Ghostwriter\PHPt\Component\Section\SkipIf;
use Ghostwriter\PHPt\Component\Section\Test;
use Ghostwriter\PHPt\Component\Test\TestCase\PHPtTestCaseInterface;
use WeakMap;

final readonly class PHPtCase implements PHPtCaseInterface
{
    public function __construct(
        private PHPtTestCaseInterface $phptTestCase,
        private WeakMap $weakMap = new WeakMap(),
    ) {
        [Credit::new(), Description::new(), Expect::new(), File::new(), SkipIf::new(), Test::new()];
    }

    public static function new(): self
    {
        return new self(
            //            PHPtCaseInterface::class
        );
    }

    public function testCase(): PHPtTestCaseInterface
    {
        return $this->phptTestCase;
    }
}
