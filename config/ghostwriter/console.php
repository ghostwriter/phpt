<?php

declare(strict_types=1);

use Ghostwriter\PHPt\Console\Command;

return [
    'name' => 'PHPt',
    'package' => 'phpt/phpt',
    'auto_exit'       => false,
    'catch_errors'     => false,
    'catch_exceptions' => false,
    'default_command' => 'phpt',
    'single_command' => true,
    'commands' => [
        'phpt'=> Command\PHPtCommand::class,
    ],
];
