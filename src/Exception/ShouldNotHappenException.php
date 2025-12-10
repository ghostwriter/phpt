<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Exception;

use Ghostwriter\PHPt\ExceptionInterface;
use LogicException;

final class ShouldNotHappenException extends LogicException implements ExceptionInterface {}
