<?php

namespace App\Data\User\Car;

use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class GetUserMaxCarUploadResponseData extends Data
{
    public function __construct(
        #[OAT\Property]
        public int $max_number_of_car_upload,
    ) {}
}
