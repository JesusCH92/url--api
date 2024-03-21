<?php

declare(strict_types=1);

namespace App\Url\ApplicationService\DTO;

readonly class UrlShorterResponse
{
    public function __construct(public string $shortUrl)
    {
    }
}
