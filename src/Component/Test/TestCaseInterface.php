<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Test;

interface TestCaseInterface
{
    public function id(): string;

    public function name(): string;
}
