<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Exception;

use Ghostwriter\Phpt\Interface\ExceptionInterface;
use LogicException;

final class NotImplementedYetException extends LogicException implements ExceptionInterface
{
}
