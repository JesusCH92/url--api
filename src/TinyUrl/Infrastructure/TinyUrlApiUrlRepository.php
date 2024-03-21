<?php

declare(strict_types=1);

namespace App\TinyUrl\Infrastructure;

use App\Common\Domain\Constant\TinyUrl;
use App\Common\Infrastructure\Framework\SymfonyClient;
use App\TinyUrl\Domain\Repository\UrlRepository;
use App\TinyUrl\Infrastructure\Exception\ServiceUnavailable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class TinyUrlApiUrlRepository extends SymfonyClient implements UrlRepository
{
    public function shortestUrlGenerator(string $urlQueryParam): string
    {
        $api = TinyUrl::API_SHORTER;

        $url = $api . $urlQueryParam;

        $response = $this->request(Request::METHOD_GET, $url);

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            throw new ServiceUnavailable('Service unavailable');
        }

        return $response->getContent();
    }
}
