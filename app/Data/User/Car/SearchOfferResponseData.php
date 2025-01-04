<?php

namespace App\Data\User\Car;

use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class SearchOfferResponseData extends Data
{
    public function __construct(
        #[OAT\Property]
        public ?int $price_from,
        #[OAT\Property]
        public ?int $price_to,
        #[OAT\Property]
        public ?int $manufacturer_id,
        #[OAT\Property]
        public ?int $year_manufactured,

    ) {}
}
