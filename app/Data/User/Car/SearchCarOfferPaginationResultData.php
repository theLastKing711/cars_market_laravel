<?php

namespace App\Data\User\Car;

use App\Data\Shared\Pagination\PaginationResultData;
use App\Data\Shared\Swagger\Property\ArrayProperty;
use Illuminate\Support\Collection;
use OpenApi\Attributes as OAT;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class SearchCarOfferPaginationResultData extends PaginationResultData
{
    /** @param Collection<int, CarListData> $data */
    public function __construct(
        int $current_page,
        int $per_page,
        #[ArrayProperty(CarListData::class)]
        /** @var CarListData[] */
        public Collection $data,
        int $total
    ) {
        parent::__construct($current_page, $per_page, $total);
    }
}
