<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Test\TestCase;

use Ghostwriter\PHPt\Component\File\FileInterface;
use Ghostwriter\PHPt\Component\Section\SectionInterface;
use Ghostwriter\PHPt\Component\Section\TestInterface;

interface PHPtTestCaseInterface
{
    /** @param iterable<FileInterface,SectionInterface> $sections */
    public static function new(TestInterface $test, iterable $sections): self;

    /** @return iterable<FileInterface,SectionInterface> */
    public function sections(): iterable;

    public function testSection(): TestInterface;
}
