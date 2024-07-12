<?php

namespace App\Api\Users\Domain\ValueObject\User;

final readonly class UserName implements \Stringable
{
    protected const REGEX = '^([\w.-]+)$';
    private string $userName;

    public function __construct(string $userName)
    {
        $this->checkIfUserNameIsValid($userName);

        $this->userName = strtolower($userName);
    }

    /**
     * @throws \InvalidArgumentException In case any validation check fails
     */
    private function checkIfUserNameIsValid(string $userName): void
    {
        $message = null;

        if (strlen($userName) < 8) {
            $message = 'It must have at least 8 characters.';
        }

        if (strlen($userName) > 50) {
            $message = 'It must have 50 or less characters.';
        }

        $pattern = sprintf('/%s/', self::REGEX);
        if (1 !== preg_match($pattern, $userName)) {
            $message = sprintf('It must match the pattern: "%s"', $pattern);
        }

        if ($message) {
            throw new \InvalidArgumentException(sprintf('Invalid UserName "%s" supplied: %s', $userName, $message));
        }
    }

    public function __toString(): string
    {
        return $this->userName;
    }
}
