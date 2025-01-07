<?php

namespace App\Data\User\Car;

use App\Data\Shared\Swagger\Property\ArrayProperty;
use Illuminate\Support\Collection;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class SearchOfferResponseData extends Data
{
    public function __construct(
        #[ArrayProperty(ManufacturerListResponseData::class)]
        public Collection $manufacturers,
    ) {}
}
