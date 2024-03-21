<?php

namespace App\Tests\Url\GetShortestUrl;

use App\TinyUrl\Domain\Repository\UrlRepository;

class SpyUrlRepository implements UrlRepository
{
    private bool $vadilateWasCalled = false;

    const string URL_SHORTER = 'URL-SHORTER';

    public function shortestUrlGenerator(string $urlQueryParam): string
    {
        $this->vadilateWasCalled = true;
        return self::URL_SHORTER;
    }

    public function verify(): bool
    {
        return $this->vadilateWasCalled;
    }
}