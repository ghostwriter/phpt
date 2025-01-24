<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Application;

interface ApplicationInterface
{
    public function run(array $arguments = []): int;
}
