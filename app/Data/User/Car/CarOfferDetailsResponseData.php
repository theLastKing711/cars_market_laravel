<?php

namespace App\Data\User\Car;

use App\Data\Shared\Media\MediaData;
use App\Data\Shared\Swagger\Property\ArrayProperty;
use App\Enum\FuelType;
use App\Enum\ImportType;
use App\Enum\SyrianCity;
use App\Enum\TransmissionType;
use Illuminate\Support\Collection;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class CarOfferDetailsResponseData extends Data
{
    /**
     * @param  Collection<int, ShippableToCityData>  $shippable_to
     * @param  Collection<int, MediaData>  $images
     **/
    public function __construct(
        #[OAT\Property]
        public int $id,
        #[OAT\Property]
        public ?string $name_ar,
        #[OAT\Property]
        public ?string $name_en,
        #[OAT\Property]
        public ?string $model,
        #[OAT\Property]
        public ?int $year_manufactured,
        #[OAT\Property]
        public ?int $car_price,
        #[OAT\Property]
        public ?int $car_label_origin,
        #[OAT\Property]
        public ?ImportType $car_import_type,
        #[OAT\Property]
        public ?int $miles_travelled_in_km,
        #[OAT\Property]
        public ?bool $is_new_car,
        #[OAT\Property]
        public ?FuelType $fuel_type,
        #[OAT\Property]
        public ?SyrianCity $car_sell_location,
        #[OAT\Property]
        public ?TransmissionType $transmission,
        #[OAT\Property]
        public ?bool $is_kassah,
        #[OAT\Property]
        public ?bool $is_khalyeh,
        #[OAT\Property]
        public ?bool $is_faragha_jahzeh,
        #[OAT\Property]
        public ?bool $is_favourite,
        #[ArrayProperty(ShippableToCityData::class)]
        /** @var ShippableToCityData[] */
        public Collection $shippable_to,
        #[ArrayProperty(MediaData::class)]
        #[MapOutputName('images')]
        /** @var MediaData[] */
        public Collection $medially,
    ) {}
}
