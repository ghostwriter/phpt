<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt;

use Ghostwriter\Phpt\Interface\File\PhptFileInterface;
use Ghostwriter\Phpt\Interface\ParserInterface;
use Ghostwriter\Phpt\Interface\PhptCaseInterface;

final class Parser implements ParserInterface
{
    public function parse(PhptFileInterface $file): PhptCaseInterface
    {
        return PhptCase::new();
    }

    public static function new(): self
    {
        return new self();
    }
}
