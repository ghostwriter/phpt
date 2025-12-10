<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Interface\Console;

interface ApplicationInterface
{
    public function execute(string $command, array $arguments = []): int;

    public function run(array $arguments = []): int;
}
