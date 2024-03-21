<?php

declare(strict_types=1);

namespace App\Url\Domain\ValueObject;

use App\Common\Domain\ValueObject\StringValueObject;
use App\Url\Domain\Exception\InvalidLink;

final class Link extends StringValueObject
{
    protected function saveIfIsAllowed(?string $value): void
    {
        if (in_array($value, ['', null], true)) {
            throw new InvalidLink('Link cannot be empty');
        }

        if (!$this->isValidUrl($value)) {
            throw new InvalidLink(sprintf('Invalid link: %s', $value));
        }
    }

    private function isValidUrl(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
