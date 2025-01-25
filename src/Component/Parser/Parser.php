<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Parser;

use Ghostwriter\Phpt\Component\File\PhptInterface;
use Ghostwriter\Phpt\Component\Test\Case\PhptCase;
use Ghostwriter\Phpt\Component\Test\Case\PhptCaseInterface;
use Override;

final class Parser implements ParserInterface
{
    public static function new(): self
    {
        return new self();
    }

    #[Override]
    public function parse(PhptInterface $phpt): PhptCaseInterface
    {
        return PhptCase::new();
    }
}
