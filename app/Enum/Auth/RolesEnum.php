<?php

namespace App\Enum\Auth;

enum RolesEnum: string
{
    case ADMIN = 'admin';

    case USER = 'user';

    case COMPANY = 'company';

    // extra helper to allow for greater customization of displayed values,
    // without disclosing the name/value data directly
    // can be used like this: RolesEnum::ADMIN->label() which return 'Admin'
    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::USER => 'User',
            self::COMPANY => 'company',
        };
    }
}
