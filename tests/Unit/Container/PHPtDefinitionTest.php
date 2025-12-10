<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Container\Interface\Service\DefinitionInterface;
use Ghostwriter\PHPt\Container\PHPtDefinition;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PHPtDefinition::class)]
final class PHPtDefinitionTest extends AbstractTestCase
{
    public function testImplementsDefinitionInterface(): void
    {
        self::assertInstanceOf(DefinitionInterface::class, new PHPtDefinition());
    }
}
