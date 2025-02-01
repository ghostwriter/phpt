<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Parser;

use Ghostwriter\Phpt\Component\File\PhptInterface;
use Ghostwriter\Phpt\Component\Test\Case\PhptCaseInterface;

interface ParserInterface
{
    public function parse(PhptInterface $phpt): PhptCaseInterface;
}
