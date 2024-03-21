<?php

namespace App\Tests\Url\GetShortestUrl;

use App\TinyUrl\ApplicationService\ShortestUrlGenerator;
use App\Url\ApplicationService\DTO\UrlShorterRequest;
use App\Url\ApplicationService\UrlShorter;
use PHPUnit\Framework\TestCase;

class ShortestUrlGeneratorTest extends TestCase
{
    /**
     * @test
     * @dataProvider validsUrlsShorterRequest
     */
    public function shouldGenerateShortUrl(string $url)
    {
        $urlRepository = new SpyUrlRepository();
        $urlShorter = new ShortestUrlGenerator($urlRepository);

        $urlShorterResponse = $urlShorter($url);

        $this->assertTrue($urlRepository->verify());
        $this->assertEquals(SpyUrlRepository::URL_SHORTER, $urlShorterResponse);
    }

    public function validsUrlsShorterRequest(): array
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