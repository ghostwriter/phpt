<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Parser;

use Ghostwriter\Phpt\Component\Parser\Parser;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Parser::class)]
final class ParserTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
