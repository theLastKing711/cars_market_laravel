<?php

namespace App\Data\User\Car\QueryParameters;

use App\Data\Shared\Pagination\QueryParameters\PaginationQueryParameterData;
use App\Data\Shared\Swagger\Property\ArrayProperty;
use App\Enum\FuelType;
use App\Enum\ImportType;
use App\Enum\SyrianCity;
use App\Enum\TransmissionType;
use OpenApi\Attributes as OAT;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class SearchCarOfferQueryParameterData extends PaginationQueryParameterData
{
    /**
     * @param  array<SyrianCity>  $shippable_to
     **/
    public function __construct(
        #[OAT\Property]
        public ?string $search,
        #[OAT\Property]
        public ?int $price_from,
        #[OAT\Property]
        public ?int $price_to,
        #[OAT\Property]
        public ?FuelType $fuel_type,
        #[OAT\Property]
        public ?TransmissionType $transmission,
        #[OAT\Property]
        public ?int $miles_travelled_in_km_from,
        #[OAT\Property]
        public ?int $miles_travelled_in_km_to,
        #[OAT\Property]
        public ?bool $user_has_legal_car_papers,
        #[OAT\Property]
        public ?bool $is_faragha_jahzeh,
        #[OAT\Property]
        public ?bool $is_new_car,
        #[OAT\Property]
        public ?bool $is_khalyeh,
        #[OAT\Property]
        public ?bool $is_kassah,
        // #[OAT\Property]
        // public ?ImportType $import_type,
        // #[ArrayProperty(SyrianCity::class)]
        // /** @var SyrianCity[] */
        // public ?array $shippable_to,
    ) {}
}
