<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt;

use Ghostwriter\Phpt\Interface\PhptCaseInterface;
use Ghostwriter\Phpt\Section\CreditSection;
use Ghostwriter\Phpt\Section\DescriptionSection;
use Ghostwriter\Phpt\Section\ExpectSection;
use Ghostwriter\Phpt\Section\FileSection;
use Ghostwriter\Phpt\Section\SkipIfSection;
use Ghostwriter\Phpt\Section\TestSection;

final class PhptCase implements PhptCaseInterface
{
    public function sections(): array
    {
        return [
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
        return new self();
    }
}
