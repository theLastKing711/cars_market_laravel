<?php

namespace App\Data\User\Car;

use App\Enum\FuelType;
use App\Enum\TransmissionType;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class CreateCarOfferRequestData extends Data
{
    public function __construct(
        #[
            OAT\Property,
            Exists('manufacturers', 'id')
        ]
        public ?int $manufacturer_id,
        #[OAT\Property]
        public ?string $manufacturer_name_ar,
        #[OAT\Property]
        public ?string $manufacturere_name_en,
        #[OAT\Property]
        public ?string $model,
        #[OAT\Property]
        public ?bool $is_new_car,
        #[OAT\Property]
        public ?int $car_price,
        #[OAT\Property]
        public ?FuelType $fuel_type,
        #[OAT\Property]
        public ?TransmissionType $transmission,
        #[OAT\Property]
        public ?int $miles_travelled_in_km,
        #[OAT\Property]
        public ?bool $is_faragha_jahzeh,
        #[OAT\Property]
        public ?bool $is_kassah,
        #[OAT\Property]
        public ?bool $is_khalyeh,
    ) {}
}
