<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema(description: '[0 => Male, 1 => Female]', type: 'integer')]
enum FuelType: int
{
    case Benzene = 1;

    case Diesel = 2;

    case Electricity = 3;

    public function label(): string
    {

        return match ($this) {
            self::Benzene => 'بنزين',
            self::Diesel => 'ديزل',
            self::Electricity => 'كهرباء',
        };
    }
}
