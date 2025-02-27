<?php

namespace App\Data\User\Car\QueryParameters;

use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class SearchMyCarQueryParameterData extends Data
{
    public function __construct(
        #[OAT\Property]
        public ?string $search,
    ) {}
}
