<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema(description: '[0 => Male, 1 => Female]', type: 'integer')]
enum ImportType: int
{
    case EuropeNew = 0;
    case EuropeOld = 1;
    case Khaliji = 2;
    case Kassah = 3;

    public function label(): string
    {
        return match ($this) {
            self::EuropeNew => 'أوروبي جديد',
            self::EuropeOld => 'أوروبي قديم',
            self::Khaliji => 'خليجي',
            self::Kassah => 'قصة',
        };
    }
}
