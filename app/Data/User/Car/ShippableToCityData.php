<?php

namespace App\Data\User\Car;

use App\Enum\SyrianCity;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class ShippableToCityData extends Data
{
    public function __construct(
        #[OAT\Property]
        public SyrianCity $city,
    ) {}
}
