<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema]
enum Color: int
{
    case White = 1;
    case Yellow = 2;
    case Red = 3;
    case Pink = 4;
    case Blue = 5;
    case Gray = 6;
    case Black = 7;
    case Orange = 8;
    case Purple = 9;
    case Brown = 10;
    case Silver = 11;
    case Gold = 12;
    case Indigo = 13;

    public function label(): string
    {
        return match ($this) {
            self::White => 'أبيض',
            self::Yellow => 'أصفر',
            self::Red => 'أحمر',
            self::Pink => 'زهري',
            self::Blue => 'أزرق',
            self::Gray => 'رمادي',
            self::Black => 'أسود',
            self::Orange => 'برتقالي',
            self::Purple => 'بنفسحي',
            self::Brown => 'بني',
            self::Gold => 'ذهبي',
            self::Indigo => 'نيلي'
        };
    }
}
