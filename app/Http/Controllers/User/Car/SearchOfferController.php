<?php

namespace App\Http\Controllers\User\Car;

use App\Data\User\Car\QueryParameters\SearchOfferQueryParameterData;
use App\Http\Controllers\Controller;
use App\Data\User\Car\SearchOfferResponseData;
use App\Data\Shared\Swagger\Response\SuccessListResponse;
use OpenApi\Attributes as OAT;

class SearchOfferController extends Controller
{

    #[OAT\Get(path: '/users/cars/{id}', tags: ['users'])]
    #[SuccessListResponse(SearchOfferResponseData::class)]
    public function __invoke(SearchOfferQueryParameterData $request,)
    {

    }
}
