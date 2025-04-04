<?php

namespace App\Data\User\Car;

use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class ChangePhoneNumberRequestData extends Data
{
    public function __construct(
        #[OAT\Property]
        public string $phone_number,
    ) {}
}
