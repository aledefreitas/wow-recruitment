<?php

namespace App\Common\Domain\ValueObject;

final readonly class Uuid implements \Stringable
{
    protected const REGEX = '^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$';
    private string $uuid;

    public function __construct(string $uuid)
    {
        $pattern = sprintf('/%s/', self::REGEX);

        if (1 !== preg_match($pattern, $uuid)) {
            throw new \InvalidArgumentException(sprintf('Invalid UUID "%s" supplied in "%s"', $uuid, get_class($this)));
        }

        $this->uuid = $uuid;
    }

    public function __toString(): string
    {
        return $this->uuid;
    }
}
