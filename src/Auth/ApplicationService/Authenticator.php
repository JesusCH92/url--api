<?php

declare(strict_types=1);

namespace App\Auth\ApplicationService;

use App\Auth\Domain\Entity\Auth;
use App\Auth\Domain\Repository\TokenRepository;

final class Authenticator
{
    public function __construct(private readonly TokenRepository $tokenRepository)
    {
    }

    public function __invoke(?string $token): void
    {
        $auth = new Auth($token);
        $this->tokenRepository->validate($auth->token()->value());
    }
}
