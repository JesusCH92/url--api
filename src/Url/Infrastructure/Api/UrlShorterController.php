<?php

declare(strict_types=1);

namespace App\Url\Infrastructure\Api;

use App\Auth\ApplicationService\Authenticator;
use App\Common\Infrastructure\Framework\SymfonyApiController;
use App\Url\ApplicationService\DTO\UrlShorterRequest;
use App\Url\ApplicationService\UrlShorter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UrlShorterController extends SymfonyApiController
{
    public function __construct(Authenticator $authenticator, private readonly UrlShorter $urlShorter)
    {
        parent::__construct($authenticator);
    }

    #[Route('/api/v1/shorts-urls', name: 'app_shorts_urls', methods: 'POST')]
    public function shortUrls(Request $request): JsonResponse
    {
        $this->tokenValidator($request);

        $payload = json_decode($request->getContent(), true);
        $url = $payload['url'] ?? null;

        $response = ($this->urlShorter)(new UrlShorterRequest($url));

        return new JsonResponse(['url' => $response->shortUrl], Response::HTTP_OK);
    }
}
