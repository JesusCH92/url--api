<?php

declare(strict_types=1);

namespace App\Common\Infrastructure\Framework;

use App\Auth\ApplicationService\Authenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

abstract class SymfonyApiController extends AbstractController
{
    public function __construct(private readonly Authenticator $authenticator)
    {
    }
    final protected function tokenValidator(Request $request): void
    {
        $token = $request->headers->get('Authorization');
        ($this->authenticator)($token);
    }
}
