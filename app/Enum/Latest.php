<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema]
enum Latest: int
{
    case TestCase = 1;

    public function label(): string
    {
        return match ($this) {
            self::TestCase => 'label1',
        };
    }
}
