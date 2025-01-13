<?php

namespace App\Data\User\Car;

use App\Data\Shared\Swagger\Property\ArrayProperty;
use App\Enum\ImportType;
use Illuminate\Support\Collection;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class CarListData extends Data
{
    public function __construct(
        #[OAT\Property]
        public ?int $manufacturer_id,
        #[OAT\Property]
        public ?string $manufacturer_name,
        #[OAT\Property]
        public ?string $model,
        #[OAT\Property]
        public ?int $year_manufactured,
        #[OAT\Property]
        public ?int $car_price,
        #[OAT\Property]
        public ?ImportType $car_import_type,
        #[OAT\Property]
        public ?int $miles_travelled_in_km,
        #[ArrayProperty(ShippableToCityData::class)]
        public Collection $shippable_to,

    ) {}
}
