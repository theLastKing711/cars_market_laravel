<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema(description: '[0 => Male, 1 => Female]', type: 'integer')]
enum TransmissionType: int
{
    case Automatic = 1;
    case Manual = 2;

    public function label(): string
    {
        return match ($this) {
            self::Automatic => 'أتوماتيك',
            self::Manual => 'عادي',
        };
    }
}
