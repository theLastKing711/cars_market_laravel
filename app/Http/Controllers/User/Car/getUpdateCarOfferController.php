<?php

namespace App\Http\Controllers\User\Car;

use App\Http\Controllers\Controller;
;
use App\Data\User\Car\getUpdateCarOfferRequestData;
use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use OpenApi\Attributes as OAT;

#[
    OAT\PathItem(
        path: '/users/cars/{id}',
        parameters: [
            new OAT\PathParameter(
                ref: '#/components/parameters/usersTestPathParameterData',
            ),
        ],
    ),
]
class getUpdateCarOfferController extends Controller
{

    #[OAT\Get(path: '/users/cars/{id}', tags: ['usersCars'])]
    #[SuccessItemResponse(getUpdateCarOfferRequestData::class)]
    public function __invoke()
    {

    }
}
