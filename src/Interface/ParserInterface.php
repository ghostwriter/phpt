<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Interface;

use Ghostwriter\Phpt\Interface\File\PhptFileInterface;

interface ParserInterface
{
    public function parse(PhptFileInterface $file): PhptCaseInterface;
}
