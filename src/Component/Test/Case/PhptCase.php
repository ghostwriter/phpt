<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Test\Case;

use Ghostwriter\Phpt\Component\Section\CreditSection;
use Ghostwriter\Phpt\Component\Section\DescriptionSection;
use Ghostwriter\Phpt\Component\Section\ExpectSection;
use Ghostwriter\Phpt\Component\Section\FileSection;
use Ghostwriter\Phpt\Component\Section\SkipIfSection;
use Ghostwriter\Phpt\Component\Section\TestSection;
use Ghostwriter\Phpt\Component\Test\TestCase\PhptTestCaseInterface;
use WeakMap;

final readonly class PhptCase implements PhptCaseInterface
{
    public function __construct(
        private PhptTestCaseInterface $phptTestCase,
        private WeakMap $weakMap,
    ) {
        [
            CreditSection::new(),
            DescriptionSection::new(),
            ExpectSection::new(),
            FileSection::new(),
            SkipIfSection::new(),
            TestSection::new(),
        ];
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
