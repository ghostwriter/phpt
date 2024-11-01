<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Interface;

interface ApplicationInterface
{
    public function run(array $arguments = []): int;
}
