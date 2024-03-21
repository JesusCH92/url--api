<?php

declare(strict_types=1);

namespace App\Auth\Infrastructure;

use App\Auth\Domain\Repository\TokenRepository;
use App\Auth\Infrastructure\Exception\InvalidCheckParentheses;

final class InMemoryTokenRepository implements TokenRepository
{
    public function validate(string $token): void
    {
        if (!$this->isValidCheckParentheses($token)) {
            throw new InvalidCheckParentheses(sprintf('Invalid token: %s', $token));
        }
    }

    private function isValidCheckParentheses(string $string): bool
    {
        $stack = [];
        $openers = ['{', '[', '('];
        $closers = ['}', ']', ')'];

        foreach (str_split($string) as $char) {
            if (in_array($char, $openers)) {
                $stack[] = $char;
            } elseif (in_array($char, $closers)) {
                $last = array_pop($stack);
                if ($last === null || array_search($last, $openers) !== array_search($char, $closers)) {
                    return false;
                }
            }
        }

        return count($stack) === 0;
    }
}
