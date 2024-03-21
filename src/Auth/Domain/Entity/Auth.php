<?php

declare(strict_types=1);

namespace App\Auth\Domain\Entity;

use App\Auth\Domain\ValueObject\Token;

final class Auth
{
    private Token $token;

    public function __construct(?string $token)
    {
        $this->token = new Token($token);
    }

    public function token(): Token
    {
        return $this->token;
    }
}
