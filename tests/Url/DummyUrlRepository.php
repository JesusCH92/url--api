<?php

namespace App\Tests\Url;

use App\TinyUrl\Domain\Repository\UrlRepository;

class DummyUrlRepository implements UrlRepository
{
    const string URL_SHORTER_MOCK = 'url-acortada';

    public function shortestUrlGenerator(string $urlQueryParam): string
    {
        return self::URL_SHORTER_MOCK;
    }
}