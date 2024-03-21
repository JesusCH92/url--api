<?php

declare(strict_types=1);

namespace App\Url\ApplicationService\DTO;

readonly class UrlShorterRequest
{
    public function __construct(public ?string $url)
    {
    }
}
