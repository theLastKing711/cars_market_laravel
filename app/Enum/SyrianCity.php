<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema(description: '[0 => Male, 1 => Female]', type: 'integer')]
enum SyrianCity: int
{
    case Aleppo = 1;

    case Damascus = 2;

    case Homs = 3;

    case Hammah = 4;

    case Latakia = 5;

    case Raqqa = 6;

    case DierElZor = 7;

    case AlHasaka = 8;

    case Qamishli = 9;

    case Tartus = 10;

    case Douma = 11;

    case AlSuwayda = 12;

    case Quneitra = 13;

    case AlbuKamal = 14;

    case Afrin = 15;

    case AlAtarib = 16;

    case Azaz = 17;

    case AlBab = 19;

    case Baniyas = 20;

    case Darayya = 21;

    case Duraykish = 22;

    case Fiq = 23;

    case AlHaffah = 24;

    case Izra = 25;

    case Jableh = 26;

    case Jarabulus = 27;

    case JisrAlShughur = 28;

    case MaaratAlNuman = 29;

    case AlMalikiyah = 30;

    case Manbij = 31;

    case Masyaf = 32;

    case Mayadin = 33;

    case Mhardeh = 34;

    case AlMukharram = 35;

    case Qardaha = 36;

    case Qatana = 37;

    case Qudsaya = 38;

    case AlQusayer = 39;

    case AlQutayfah = 40;

    case RasAlAyn = 41;

    case AlRastan = 42;

    case AlSafira = 43;

    case Safita = 44;

    case Salamiyah = 45;

    case Salkhad = 46;

    case AlSanamayn = 47;

    case Salqin = 48;

    case AlShaykhBadr = 49;

    case AlSuqaylabiyah = 50;

    case Tadmur = 51;

    case TellAbyad = 52;

    case Taldou = 53;

    case Talalakh = 54;

    case AlTall = 55;

    case AlThawrah = 56;

    case Yabroud = 57;

    case Zabadani = 58;

    case Daraa = 59;

    case Idleb = 60;

    case Ariha = 61;

    case DayrHafir = 62;

    case AlNabk = 63;

    case AynAlArab = 64;

    public function label(): string
    {
        return match ($this) {
            self::Aleppo => 'حلب',
            self::Damascus => 'دمشق',
            self::Homs => 'حمص',
            self::Hammah => 'حماة',
            self::Latakia => 'اللاذقية',
            self::Raqqa => 'الرقة',
            self::DierElZor => 'دير الزور',
            self::AlHasaka => 'الحسكة',
            self::Qamishli => 'القامشلي',
            self::Tartus => 'طرطوس',
            self::Douma => 'دوما',
            self::Idleb => 'إدلب',
            self::Daraa => 'درعا',
            self::AlSuwayda => 'السويداء',
            self::Quneitra => 'القنيطرة',
            self::AlbuKamal => 'اليوكمال',
            self::Afrin => 'عفرين',
            self::Ariha => 'أريحا',
            self::AlAtarib => 'اﻷتارب',
            self::AynAlArab => 'عين العرب',
            self::Azaz => 'عزاز',
            self::AlBab => 'الباب',
            self::Baniyas => 'بانياس',
            self::Darayya => 'داريا',
            self::DayrHafir => 'دير حافر',
            self::Duraykish => 'دريكيش',
            self::Fiq => 'فيق',
            self::AlHaffah => 'الهفا',
            self::Izra => 'أزرع',
            self::Jableh => 'جبلة',
            self::Jarabulus => 'جرابلس',
            self::JisrAlShughur => 'جسر الشغور',
            self::MaaratAlNuman => 'معرة النعمان',
            self::AlMalikiyah => 'المالكية',
            self::Manbij => 'منبج',
            self::Masyaf => 'مصياف',
            self::Mayadin => 'الميادين',
            self::Mhardeh => 'محردة',
            self::AlMukharram => 'المخرم',
            self::AlNabk => 'النبك',
            self::Qardaha => 'القرداحة',
            self::Qatana => 'قطنا',
            self::Qudsaya => 'قدسيا',
            self::AlQusayer => 'القصير',
            self::AlQutayfah => 'القطيفة',
            self::RasAlAyn => 'رأس العين',
            self::AlRastan => 'الرستن',
            self::AlSafira => 'السفيرة',
            self::Safita => 'صافيتا',
            self::Salamiyah => 'سلمية',
            self::Salkhad => 'صلخد',
            self::AlSanamayn => 'الصنمين',
            self::Salqin => 'سلقين',
            self::AlShaykhBadr => 'الشيخ بدر',
            self::AlSuqaylabiyah => 'السقيلبية',
            self::Tadmur => 'تدمر',
            self::TellAbyad => 'تل أبيض',
            self::Taldou => 'تلدو',
            self::Talalakh => 'تلكلخ',
            self::AlTall => 'التل',
            self::AlThawrah => 'الثورة',
            self::Yabroud => 'يبرود',
            self::Zabadani => 'الزبداني',
        };
    }
}
