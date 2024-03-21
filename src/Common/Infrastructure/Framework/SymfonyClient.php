<?php

declare(strict_types=1);

namespace App\Common\Infrastructure\Framework;

use App\Common\Infrastructure\Exception\InvalidRequest;
use Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class SymfonyClient
{
    public function __construct(private readonly HttpClientInterface $client)
    {
    }

    protected function request(string $method, string $url): ResponseInterface
    {
        try {
            $response = $this->client->request($method, $url);
        } catch (Exception $e) {
            throw new InvalidRequest('Invalid request: ' . $e->getMessage());
        }

        return $response;
    }
}
