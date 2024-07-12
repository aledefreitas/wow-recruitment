<?php

namespace App\Api\Users\Domain\ValueObject\User;

enum Status: string
{
    case Active = 'active';
    case Pending = 'pending';
    case Removed = 'removed';
}
