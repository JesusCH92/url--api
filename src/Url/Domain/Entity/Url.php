<?php

declare(strict_types=1);

namespace App\Url\Domain\Entity;

use App\Url\Domain\ValueObject\Link;

final class Url
{
    private Link $link;

    public function __construct(?string $url)
    {
        $this->link = new Link($url);
    }

    public function link(): Link
    {
        return $this->link;
    }
}
