<?php

declare(strict_types=1);

namespace App\Auth\Domain\Exception;

use Exception;
use Throwable;

final class InvalidToken extends Exception
{
    public function __construct(string $value, $code = 401, Throwable $previous = null)
    {
        parent::__construct($value, $code, $previous);
    }
}
