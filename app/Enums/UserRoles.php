<?php

namespace App\Enums;

enum UserRoles: int
{
    case ADMIN_ROLE = 1;
    case USER_ROLE = 2;

    public function label(): string
    {
        return match ($this) {
            UserRoles::ADMIN_ROLE => 'Admin',
            UserRoles::USER_ROLE => 'User',
            default => 'Not found'
        };
    }
}
