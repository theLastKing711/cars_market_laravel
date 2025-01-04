<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema(description: '[0 => Male, 1 => Female]', type: 'integer')]
enum FuelType: int
{
    case Benzene = 0;

    case Diesel = 1;

    case Electricity = 2;

    public function label(): string
    {
        return match ($this) {
            self::Benzene => 'بنزين',
            self::Diesel => 'ديزل',
            self::Electricity => 'كهرباء',
        };
    }
}
