<?php

namespace App\Http\Controllers\User\Car;

use App\Data\User\Car\PathParameters\CarIdPathParameterData;
use App\Data\User\Car\UpdateCarOfferRequestData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use OpenApi\Attributes as OAT;

#[
    OAT\PathItem(
        path: '/users/cars/{id}',
        parameters: [
            new OAT\PathParameter(
                ref: '#/components/parameters/usersCarIdPathParameterData',
            ),
        ],
    ),
]
class CarController extends Controller
{

}
