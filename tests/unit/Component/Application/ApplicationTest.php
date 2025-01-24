<?php

declare(strict_types=1);

namespace Tests\Unit\Component\Application;

use Ghostwriter\Phpt\Component\Application\Application;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Application::class)]
final class ApplicationTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
