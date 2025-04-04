<?php

namespace App\Data\User\Auth;

use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class GetUserPhoneNumberResponseData extends Data
{
    public function __construct(
        #[OAT\Property]
        public string $phone_number,
    ) {}
}
