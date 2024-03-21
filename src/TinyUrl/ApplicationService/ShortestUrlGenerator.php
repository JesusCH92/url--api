<?php

declare(strict_types=1);

namespace App\TinyUrl\ApplicationService;

use App\TinyUrl\Domain\Repository\UrlRepository;

final class ShortestUrlGenerator
{
    public function __construct(private readonly UrlRepository $repository)
    {
    }

    public function __invoke(string $url): string
    {
        return $this->repository->shortestUrlGenerator($url);
    }
}
