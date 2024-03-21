<?php

declare(strict_types=1);

namespace App\TinyUrl\Domain\Repository;

interface UrlRepository
{
    public function shortestUrlGenerator(string $urlQueryParam): string;
}
