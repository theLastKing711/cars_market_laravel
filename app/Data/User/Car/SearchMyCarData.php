<?php

namespace App\Data\User\Car;

use App\Data\Shared\Casts\MediallyToSingleMediaCast;
use App\Data\Shared\Media\MediaData;
use App\Enum\FuelType;
use App\Enum\SyrianCity;
use App\Models\Car;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class SearchMyCarData extends Data
{
    public function __construct(
        #[OAT\Property]
        public int $id,
        #[OAT\Property]
        public ?string $name_ar,
        #[OAT\Property]
        public ?string $name_en,
        #[OAT\Property]
        public ?int $car_price,
        #[OAT\Property]
        public ?int $miles_travelled_in_km,
        #[OAT\Property]
        public ?bool $is_new_car,
        #[OAT\Property]
        public ?FuelType $fuel_type,
        #[OAT\Property]
        public ?SyrianCity $car_sell_location,
        #[OAT\Property]
        public ?bool $is_kassah,
        #[OAT\Property]
        public ?bool $is_khalyeh,
        #[OAT\Property]
        public ?bool $is_faragha_jahzeh,
        #[OAT\Property]
        public int $views,
        // #[ArrayProperty(ShippableToCityData::class)]
        // /** @var ShippableToCityData[] */
        // public Collection $shippable_to,
        // public ?MediaData $medially,
        #[WithCast(MediallyToSingleMediaCast::class)]
        #[MapOutputName('image')]
        #[OAT\Property]
        public ?MediaData $medially,
    ) {}

    // public static function collectArray($items, int $user_id): CarListCollection
    // {

    //     return new CarListCollection(
    //         parent::collect(
    //             collect($items->items())->map(fn($item) => static::fromModel($item, $user_id))
    //         ),
    //     );
    // }

    // public static function fromModelLocal(Car $car)
    // {

    //     $media = $car->medially->first();

    //     $single_media_data =
    //         isset($media)
    //         ?
    //         new MediaData(id: $media->id, file_url: $media->file_url)
    //         :
    //         null;

    //     return new SearchMyCarData(
    //         id: $car->id,
    //         name_ar: $car->name_ar,
    //         name_en: $car->name_en,
    //         car_price: $car->car_price,
    //         car_import_type: null,
    //         miles_travelled_in_km: $car->miles_travelled_in_km,
    //         is_new_car: $car->is_new_car,
    //         fuel_type: FuelType::tryFrom($car->fuel_type),
    //         is_kassah: $car->is_kassah,
    //         is_khalyeh: $car->is_khalyeh,
    //         is_faragha_jahzeh: $car->is_faragha_jahzeh,
    //         view: $car->views,
    //         image: $single_media_data
    //     );
    // }
}
