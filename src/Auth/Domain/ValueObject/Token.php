<?php

declare(strict_types=1);

namespace App\Auth\Domain\ValueObject;

use App\Common\Domain\ValueObject\StringValueObject;
use App\Auth\Domain\Exception\InvalidToken;

final class Token extends StringValueObject
{
    protected function saveIfIsAllowed(?string $value): void
    {
        if (in_array($value, ['', null], true)) {
            throw new InvalidToken('Token cannot be empty');
        }
    }
}
