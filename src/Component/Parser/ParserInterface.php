<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Parser;

use Ghostwriter\PHPt\Component\File\PHPtInterface;
use Ghostwriter\PHPt\Component\Test\Case\PHPtCaseInterface;

interface ParserInterface
{
    public function parse(PHPtInterface $phpt): PHPtCaseInterface;
}
