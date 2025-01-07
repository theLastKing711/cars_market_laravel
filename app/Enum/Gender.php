<?php

namespace App\Enum;

use App\Trait\EnumHelper;
use OpenApi\Attributes as OAT;

#[OAT\Schema(description: '[0 => Male, 1 => Female]', type: 'integer')]
enum Gender: int
{
    case Male = 1;
    case Female = 2;

    use EnumHelper;
}
