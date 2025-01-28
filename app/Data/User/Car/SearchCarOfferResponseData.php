<?php

namespace App\Data\User\Car;

use App\Data\Shared\Swagger\Property\ArrayProperty;
use Illuminate\Support\Collection;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class SearchCarOfferResponseData extends Data
{
    /**
     * @param  Collection<int, CarListData>  $user_city_cars
     **/
    public function __construct(
        #[OAT\Property(SearchCarOfferPaginationResultData::class)]
        public SearchCarOfferPaginationResultData $paginated_cars_search_result,
        #[ArrayProperty(CarListData::class)]
        public Collection $user_city_cars,
    ) {}
}
