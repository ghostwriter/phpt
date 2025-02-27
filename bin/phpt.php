#!/usr/bin/env php
<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Console;

use ErrorException;
use Ghostwriter\Phpt\Component\Application\Application;

use const DIRECTORY_SEPARATOR;
use const STDERR;

use function dirname;
use function file_exists;
use function fwrite;
use function set_error_handler;

(static function (string $autoloader): void {
    set_error_handler(static function (int $severity, string $message, string $file, int $line): never {
        throw new ErrorException($message, 255, $severity, $file, $line);
    });

    if (! file_exists($autoloader)) {
        fwrite(STDERR, '[ERROR]Cannot locate "' . $autoloader . '"\n please run "composer install"\n');
        exit(1);
    }

    require $autoloader;

    /** #BlackLivesMatter */
    exit(Application::new()->run($_SERVER['argv']));
})($_composer_autoload_path ?? dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php');
