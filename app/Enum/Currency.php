<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema(description: '[0 => Male, 1 => Female]', type: 'integer')]
enum Currency: int
{
    case Dollar = 1;
    case SyrianPound = 2;

    public function label(): string
    {
        return match ($this) {
            self::Dollar => 'USD',
            self::SyrianPound => 'SP',
        };
    }
}
