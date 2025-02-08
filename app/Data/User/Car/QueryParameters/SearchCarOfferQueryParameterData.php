<?php

namespace App\Data\User\Car\QueryParameters;

use App\Data\Shared\Swagger\Property\ArrayProperty;
use App\Enum\FuelType;
use App\Enum\ImportType;
use App\Enum\SyrianCity;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class SearchCarOfferQueryParameterData extends Data
{
    /**
     * @param  array<SyrianCity>  $shippable_to
     **/
    public function __construct(
        #[OAT\Property]
        public ?string $search,
        #[OAT\Property]
        public ?SyrianCity $user_current_syrian_city,
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
        public ?int $miles_travelled_in_km_from,
        #[OAT\Property]
        public ?int $miles_travelled_in_km_to,
        #[OAT\Property]
        public ?bool $user_has_legal_car_papers,
        #[OAT\Property]
        public ?bool $faragha_jahzeh,
        #[OAT\Property]
        public ?ImportType $import_type,
        #[ArrayProperty(SyrianCity::class)]
        /** @var SyrianCity[] */
        public ?array $shippable_to,
    ) {}
}
