<?php

namespace App\Data\User\Car;

use App\Data\Shared\Media\MediaData;
use App\Data\Shared\Swagger\Property\ArrayProperty;
use App\Enum\FuelType;
use App\Enum\ImportType;
use App\Enum\SyrianCity;
use App\Enum\TransmissionType;
use App\Models\Car;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
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
        public string $fcm_token,
        #[OAT\Property]
        public ?string $name_ar,
        #[OAT\Property]
        public ?string $name_en,
        #[OAT\Property]
        public ?int $car_price,
        #[OAT\Property]
        // public ?int $car_label_origin,
        // #[OAT\Property]
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
        // /** @var ShippableToCityData[] */
        // public Collection $shippable_to,
        #[ArrayProperty(MediaData::class)]
        #[MapOutputName('images')]
        /** @var MediaData[] */
        public Collection $images,
        #[OAT\Property]
        public string $phone_number,
        #[OAT\Property]
        public ?int $max_number_of_car_upload,
    ) {}

    public static function fromModel(Car $car): self
    {

        Log::info($car);

        return new CarOfferDetailsResponseData(
            id: $car->id,
            fcm_token: $car->user->fcm_token,
            name_ar: $car->name_ar,
            name_en: $car->name_en,
            car_price: $car->car_price,
            car_import_type: null,
            miles_travelled_in_km: $car->miles_travelled_in_km,
            is_new_car: $car->is_new_car,
            fuel_type: FuelType::tryFrom($car->fuel_type),
            car_sell_location: SyrianCity::tryFrom($car->car_sell_location),
            transmission: TransmissionType::tryFrom($car->transmission),
            is_kassah: $car->is_kassah,
            is_khalyeh: $car->is_khalyeh,
            is_faragha_jahzeh: $car->is_faragha_jahzeh,
            is_favourite: $car->is_favourite,
            // shippable_to: ShippableToCityData::collect($car->shippable_to),
            images: MediaData::collect($car->medially),
            phone_number: $car->user->phone_number,
            max_number_of_car_upload: $car->user->max_number_of_car_upload
        );
    }
}
