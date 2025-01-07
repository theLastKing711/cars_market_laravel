<?php

namespace App\Data\User\Car;

use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class ManufacturerListResponseData extends Data
{
    public function __construct(
        #[OAT\Property]
        public string $name_ar,
        #[OAT\Property]
        public string $name_en,
        #[OAT\Property]
        public string $logo,
    ) {}
}
