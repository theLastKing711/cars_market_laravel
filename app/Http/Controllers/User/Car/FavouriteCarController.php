<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\Car\CarIdPathParameterData;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
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
class FavouriteCarController extends Controller
{
    #[OAT\Post(path: '/user/cars/favourite/{id}', tags: ['usersCars'])]
    #[SuccessNoContentResponse]
    public function __invoke(CarIdPathParameterData $carIdPathParameterData)
    {

        $user_id = Auth::User()->id;

        $logged_user =
            User::query()
                ->firstWhere(
                    'id',
                    $user_id
                );

        $car_id =
                $carIdPathParameterData
                    ->id;

        $logged_user
            ->favouriteCars()
            ->toggle($car_id);

    }
}
