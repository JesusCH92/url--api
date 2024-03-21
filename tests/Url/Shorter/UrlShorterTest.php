<?php

namespace App\Tests\Url\Shorter;

use App\Tests\Url\DummyUrlRepository;
use App\TinyUrl\ApplicationService\ShortestUrlGenerator;
use App\Url\ApplicationService\DTO\UrlShorterRequest;
use App\Url\ApplicationService\UrlShorter;
use App\Url\Domain\Exception\InvalidLink;
use PHPUnit\Framework\TestCase;

class UrlShorterTest extends TestCase
{
    /**
     * @test
     * @dataProvider invalidsUrlsShorterRequest
     */
    public function throwInvalidLink(?string $url)
    {
        $this->expectException(InvalidLink::class);

        $shortestUrlGenerator = new ShortestUrlGenerator(new DummyUrlRepository());

        $urlShorter = new UrlShorter($shortestUrlGenerator);
        $urlShorter(new UrlShorterRequest($url));
    }

    /**
     * @test
     * @dataProvider validUrlsShorterRequest
     */
    public function shouldShortUrl(string $url)
    {
        $shortestUrlGenerator = new ShortestUrlGenerator(new DummyUrlRepository());

        $urlShorter = new UrlShorter($shortestUrlGenerator);
        $response = $urlShorter(new UrlShorterRequest($url));

        $this->assertIsString($response->shortUrl, DummyUrlRepository::URL_SHORTER_MOCK);
    }
    public function invalidsUrlsShorterRequest(): array
    {
        return [
            [''],
            [null],
            ['hola'],
            ['asdasdasda'],
            ['hola1'],
            ['rhrhtrdfgdfg'],
            ['http//:'],
            ['dfsdvsdscs'],
            ['hola111111111111'],
            ['sadasdasdasdasddads'],
            ['hola'],
            ['fghfbfgfgfg'],
            ['hola'],
            ['trdeee'],
            ['hola'],
            ['hg'],
            ['sdfsdf'],
            ['ppppl'],
            ['una-url-falsa'],
            ['sin-url'],
        ];
    }

    public function validUrlsShorterRequest(): array
    {
        return [
            ['https://www.google.com'],
            ['https://www.facebook.com'],
            ['https://www.twitter.com'],
            ['https://www.github.com'],
            ['https://www.linkedin.com'],
            ['https://www.instagram.com'],
            ['https://www.youtube.com'],
            ['https://www.wikipedia.org'],
            ['https://www.reddit.com'],
            ['https://www.medium.com'],
            ['https://www.pinterest.com'],
            ['https://www.wordpress.com'],
            ['https://www.adobe.com'],
            ['https://www.microsoft.com'],
            ['https://www.apple.com'],
            ['https://www.amazon.com'],
            ['https://www.netflix.com'],
            ['https://www.spotify.com'],
            ['https://www.dropbox.com'],
            ['https://www.slack.com'],
        ];
    }
}