<?php

namespace App\Data\Admin\Car;

use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[OAT\Schema()]
class CarResponseData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
}
