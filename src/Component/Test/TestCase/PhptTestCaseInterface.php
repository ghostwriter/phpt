<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Test\TestCase;

use Ghostwriter\Phpt\Component\File\FileInterface;
use Ghostwriter\Phpt\Component\Section\SectionInterface;
use Ghostwriter\Phpt\Component\Section\TestSectionInterface;

interface PhptTestCaseInterface
{
    /**
     * @param iterable<FileInterface,SectionInterface> $sections
     */
    public static function new(TestSectionInterface $testSection, iterable $sections): self;

    /**
     * @return iterable<FileInterface,SectionInterface>
     */
    public function sections(): iterable;

    public function testSection(): TestSectionInterface;
}
