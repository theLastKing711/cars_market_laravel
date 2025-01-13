<?php

namespace App\Http\Controllers\User\Car;

use App\Data\User\Car\QueryParameters\SearchCarOfferssQueryParameterData;
use App\Http\Controllers\Controller;
use App\Data\Shared\Swagger\Parameter\QueryParameter\QueryParameter;
use App\Data\User\Car\SearchCarOfferssPaginationResultData;
use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use OpenApi\Attributes as OAT;

class SearchCarOfferssController extends Controller
{

    #[OAT\Get(path: '/users/cars', tags: ['usersCars'])]
    #[QueryParameter('page', 'integer')]
    #[QueryParameter('perPage', 'integer')]
    #[SuccessItemResponse(SearchCarOfferssPaginationResultData::class)]
    public function __invoke(SearchCarOfferssQueryParameterData $request)
    {

    }
}
