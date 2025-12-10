<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Exception;

use Ghostwriter\PHPt\ExceptionInterface;
use LogicException;

final class NotImplementedYetException extends LogicException implements ExceptionInterface {}
