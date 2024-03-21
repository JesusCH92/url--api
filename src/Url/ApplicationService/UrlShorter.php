<?php

declare(strict_types=1);

namespace App\Url\ApplicationService;

use App\TinyUrl\ApplicationService\ShortestUrlGenerator;
use App\Url\ApplicationService\DTO\UrlShorterRequest;
use App\Url\ApplicationService\DTO\UrlShorterResponse;
use App\Url\Domain\Entity\Url;

final class UrlShorter
{
    public function __construct(private readonly ShortestUrlGenerator $shortestUrlGenerator)
    {
    }

    public function __invoke(UrlShorterRequest $request): UrlShorterResponse
    {
        $url = new Url($request->url);

        $shortestUrl = ($this->shortestUrlGenerator)($url->link()->value());

        return new UrlShorterResponse($shortestUrl);
    }
}
