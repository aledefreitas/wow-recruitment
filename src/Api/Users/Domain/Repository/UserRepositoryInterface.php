<?php

namespace App\Api\Users\Domain\Repository;

use App\Api\Users\Domain\Entity\User;
use App\Common\Domain\ValueObject\Uuid;

interface UserRepositoryInterface
{
    public function findUserByUuid(Uuid $uuid): ?User;
}
