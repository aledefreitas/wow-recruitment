<?php

namespace App\Api\Users\Domain\Entity;

use App\Api\Users\Domain\ValueObject\User\Status;
use App\Api\Users\Domain\ValueObject\User\UserName;
use App\Common\Domain\ValueObject\Email;
use App\Common\Domain\ValueObject\Uuid;

final class User
{
    public function __construct(
        private int $id,
        private Uuid $uuid,
        private UserName $username,
        private Email $email,
        private string $password,
        private Status $status,
        private ?string $bnetToken,
        private ?string $country,
        private ?string $timezone,
        private ?\DateTimeImmutable $createdAt,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): User
    {
        $this->id = $id;

        return $this;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function setUuid(Uuid $uuid): User
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getUsername(): UserName
    {
        return $this->username;
    }

    public function setUsername(UserName $username): User
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): User
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;

        return $this;
    }

    public function getBnetToken(): ?string
    {
        return $this->bnetToken;
    }

    public function setBnetToken(?string $bnetToken): User
    {
        $this->bnetToken = $bnetToken;

        return $this;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): User
    {
        $this->status = $status;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): User
    {
        $this->country = $country;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): User
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(): User
    {
        $this->createdAt = new \DateTimeImmutable();

        return $this;
    }
}
