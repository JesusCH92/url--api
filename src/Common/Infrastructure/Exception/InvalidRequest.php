<?php

declare(strict_types=1);

namespace App\Common\Infrastructure\Exception;

use Exception;
use Throwable;

class InvalidRequest extends Exception
{
    public function __construct(string $value, $code = 503, Throwable $previous = null)
    {
        parent::__construct($value, $code, $previous);
    }
}
