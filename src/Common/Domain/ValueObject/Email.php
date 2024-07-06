<?php

namespace App\Common\Domain\ValueObject;

final readonly class Email implements \Stringable
{
    private string $email;

    public function __construct(string $email)
    {
        if (filter_var($email, \FILTER_VALIDATE_EMAIL)) {
            // phpcs:ignore
            throw new \InvalidArgumentException(sprintf('Invalid EMAIL "%s" supplied in "%s"', $email, get_class($this)));
        }

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
