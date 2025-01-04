<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema(description: '[0 => Male, 1 => Female]', type: 'integer')]
enum SyrianCity: int
{
    case Aleppo = 0;

    case Damascus = 1;

    case Homs = 2;

    case Hammah = 3;

    case Latakia = 4;

    case Raqqa = 5;

    case DierElZor = 6;

    case AlHasaka = 7;

    case Qamishli = 8;

    case Tartus = 9;

    case Douma = 10;

    case AlSuwayda = 11;

    case Quneitra = 12;

    case AlbuKamal = 13;

    case Afrin = 14;

    case AlAtarib = 15;

    case Azaz = 16;

    case AlBab = 18;

    case Baniyas = 18;

    case Darayya = 19;

    case Duraykish = 20;

    case Fiq = 21;

    case AlHaffah = 22;

    case Izra = 23;

    case Jableh = 24;

    case Jarabulus = 25;

    case JisrAlShughur = 26;

    case MaaratAlNuman = 27;

    case AlMalikiyah = 28;

    case Manbij = 29;

    case Masyaf = 30;

    case Mayadin = 31;

    case Mhardeh = 32;

    case AlMukharram = 33;

    case Qardaha = 34;

    case Qatana = 35;

    case Qudsaya = 36;

    case AlQusayer = 37;

    case AlQutayfah = 37;

    case RasAlAyn = 38;

    case AlRastan = 39;

    case AlSafira = 40;

    case Safita = 41;

    case Salamiyah = 42;

    case Salkhad = 43;

    case AlSanamayn = 44;

    case Salqin = 45;

    case AlShaykhBadr = 46;

    case AlSuqaylabiyah = 47;

    case Tadmur = 48;

    case TellAbyad = 49;

    case Taldou = 50;

    case Talalakh = 51;

    case AlTall = 52;

    case AlThawrah = 53;

    case Yabroud = 54;

    case Zabadani = 55;

    case Daraa = 56;

    case Idleb = 57;

    case Ariha = 58;

    case DayrHafir = 58;

    case AlNabk = 59;

    case AynAlArab = 60;

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
