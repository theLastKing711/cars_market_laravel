<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema(description: '[0 => Male, 1 => Female]', type: 'integer')]
enum Currency: int
{
    case Dollar = 0;
    case SyrianPound = 1;

    public function label(): string
    {
        return match ($this) {
            self::Dollar => 'USD',
            self::SyrianPound => 'SP',
        };
    }
}
