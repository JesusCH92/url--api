<?php

declare(strict_types=1);

namespace App\Auth\Domain\Repository;

interface TokenRepository
{
    public function validate(string $token): void;
}
