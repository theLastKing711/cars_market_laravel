<?php

namespace App\Data\User\Car\QueryParameters;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;
use OpenApi\Attributes as OAT;

#[TypeScript]
#[Oat\Schema()]
class SearchOfferQueryParameterData extends Data
{
    public function __construct(

    ) {}

}
