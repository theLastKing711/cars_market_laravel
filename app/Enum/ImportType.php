<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema(description: '[0 => Male, 1 => Female]', type: 'integer')]
enum ImportType: int
{
    case EuropeNew = 1;
    case EuropeOld = 2;
    case Khaliji = 3;
    case Korean = 3;
    case American = 4;
    case Kassah = 5;

    public function label(): string
    {
        return match ($this) {
            self::EuropeNew => 'أوروبي جديد',
            self::EuropeOld => 'أوروبي قديم',
            self::Khaliji => 'خليجي',
            self::Korean => 'كوري',
            self::American => 'أمريكي',
            self::Kassah => 'قصة',
        };
    }
}
