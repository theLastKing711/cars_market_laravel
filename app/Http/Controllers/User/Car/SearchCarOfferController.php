<?php

namespace App\Http\Controllers\User\Car;

use App\Http\Controllers\Controller;
use App\Data\User\Car\SearchCarOfferData;
use App\Data\Shared\Swagger\Response\SuccessListResponse;
use OpenApi\Attributes as OAT;

class SearchCarOfferController extends Controller
{

    #[OAT\Get(path: '/users/cars/{id}', tags: ['users'])]
    #[SuccessListResponse(SearchCarOfferData::class)]
    public function __invoke()
    {

    }
}
