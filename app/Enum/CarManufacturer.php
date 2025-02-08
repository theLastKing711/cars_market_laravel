<?php

namespace App\Enum;

use OpenApi\Attributes as OAT;

#[OAT\Schema]
enum CarManufacturer: int
{
    case Toyota = 1;
    case Kia = 2;
    case Hyundai = 3;
    case Ford = 4;
    case Mitsubishi = 5;
    case Nissan = 6;
    case Chevrolet = 7;
    case Mazda = 8;
    case Mg = 9;
    case Infinity = 10;
    case Mini = 11;
    case Citron = 12;
    case Chery = 13;
    case Haval = 14;
    case Changan = 15;
    case Jetour = 16;
    case Volkswagen = 17;
    case Renault = 18;
    case Baic = 19;
    case Suzuki = 20;
    case Maxus = 21;
    case Honda = 22;
    case BMW = 23;
    case Porche = 24;
    case Ferrari = 25;
    case MercedesBenz = 26;
    case Audi = 27;
    case Geely = 28;
    case Genesis = 29;
    case Bugatti = 30;
    case Daewoo = 31;
    case Dodge = 32;
    case Jeep = 33;
    case Lamborghini = 34;
    case Opwl = 35;
    case Skoda = 36;
    case Subaru = 37;
    case Volvo = 38;
    case Lexus = 39;
    case LandRover = 40;
    case Jaguar = 41;
    case Isuzu = 42;
    case Iveco = 43;
    case Peugeot = 44;
    case Saba = 45;
    case AstonMartin = 46;

}
