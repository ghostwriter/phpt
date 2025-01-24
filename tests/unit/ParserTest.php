<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Phpt\Component\Parser\Parser;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Parser::class)]
final class ParserTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
