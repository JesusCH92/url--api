<?php

declare(strict_types=1);

namespace App\Url\Infrastructure\Api;

use App\Auth\ApplicationService\Authenticator;
use App\Common\Infrastructure\Framework\SymfonyApiController;
use App\Url\ApplicationService\DTO\UrlShorterRequest;
use App\Url\ApplicationService\UrlShorter;
use OpenApi\Attributes as OA;
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
    #[OA\Post(
        path: "/api/v1/shorts-urls",
        summary: "Shorten a URL",
        requestBody: new OA\RequestBody(
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    required: ["url"],
                    properties: [
                        new OA\Property(
                            property: "url",
                            description: "The URL to be shortened",
                            type: "string",
                            example: "https://symfony.com/"
                        )
                    ],
                    type: "object"
                )
            )
        ),
        tags: ["URL"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Successful operation",
                content: new OA\MediaType(
                    mediaType: "application/json",
                    schema: new OA\Schema(
                        properties: [
                            new OA\Property(
                                property: "url",
                                description: "The shortened URL",
                                type: "string"
                            )
                        ],
                        type: "object"
                    )
                )
            )
        ]
    )]
    public function shortUrls(Request $request): JsonResponse
    {
        $this->tokenValidator($request);

        $payload = json_decode($request->getContent(), true);
        $url = $payload['url'] ?? null;

        $response = ($this->urlShorter)(new UrlShorterRequest($url));

        return new JsonResponse(['url' => $response->shortUrl], Response::HTTP_OK);
    }
}
