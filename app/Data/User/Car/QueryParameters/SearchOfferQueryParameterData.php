<?php

namespace App\Data\User\Car\QueryParameters;

use App\Enum\FuelType;
use App\Enum\ImportType;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class SearchOfferQueryParameterData extends Data
{
    public function __construct(
        #[OAT\Property]
        public ?int $manufacturer_id,
        #[OAT\Property]
        public ?int $price_from,
        #[OAT\Property]
        public ?int $price_to,
        #[OAT\Property]
        public ?int $car_sell_location,
        #[OAT\Property]
        public ?int $year_manufactured,
        #[OAT\Property]
        public ?FuelType $fuel_type,
        #[OAT\Property]
        public ?int $car_label_origin,
        #[OAT\Property]
        public ?int $miles_travelled_in_km,
        #[OAT\Property]
        public ?int $miles_travelled_in_km_from,
        #[OAT\Property]
        public ?int $miles_travelled_in_km_to,
        #[OAT\Property]
        public ?bool $user_has_legal_car_papers,
        #[OAT\Property]
        public ?bool $faragha_jahzeh,
        #[OAT\Property]
        public ImportType $import_type,
    ) {}
}
