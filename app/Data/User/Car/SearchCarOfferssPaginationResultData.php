<?php

namespace App\Data\User\Car;

use App\Data\User\Car\SearchCarOfferssData;
use App\Data\Shared\Pagination\PaginationResultData;
use App\Data\Shared\Swagger\Property\ArrayProperty;
use Illuminate\Support\Collection;
use OpenApi\Attributes as OAT;

#[Oat\Schema()]
class SearchCarOfferssPaginationResultData  extends PaginationResultData
{
    /** @param Collection<int, SearchCarOfferssData> $data */
    public function __construct(
        int $current_page,
        int $per_page,
        #[ArrayProperty(SearchCarOfferssData::class)]
        public Collection $data,
        int $total
    ) {
        parent::__construct($current_page, $per_page, $total);
    }
}

