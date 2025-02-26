<?php

namespace App\Enum\Auth;

enum SubscriptionType: int
{
    case BASIC = 0;

    case SLIVER = 1;

    case GOLD = 2;

    // case PLATINUM = 3;

    public function maximum_number_of_cars_allowed_to_upload(): int
    {
        return match ($this) {
            self::BASIC => 100,
            self::SLIVER => 200,
            self::GOLD => 300,
        };
    }
}
