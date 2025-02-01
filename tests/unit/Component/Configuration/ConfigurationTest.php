<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Configuration;

use Ghostwriter\Phpt\Component\Configuration\Configuration;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Configuration::class)]
final class ConfigurationTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
