<?php

namespace App\Data\User\Car;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;
use OpenApi\Attributes as OAT;

#[TypeScript]
#[Oat\Schema()]
class SearchMyCarData extends Data
{
    public function __construct(

    ) {}

}
