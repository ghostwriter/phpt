<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Exception;

use Ghostwriter\Phpt\ExceptionInterface;
use LogicException;

final class ShouldNotHappenException extends LogicException implements ExceptionInterface {}
