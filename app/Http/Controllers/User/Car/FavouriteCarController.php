<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\Car\PathParameters\CarIdPathParameterData;
use App\Http\Controllers\Controller;
use App\Models\User;
use OpenApi\Attributes as OAT;

class FavouriteCarController extends Controller
{
    #[
        OAT\PathItem(
            path: '/user/cars/{id}/favourite',
            parameters: [
                new OAT\PathParameter(
                    ref: '#/components/parameters/usersCarIdPathParameterData',
                ),
            ],
        ),
    ]
    #[OAT\Post(path: '/user/cars/{id}/favourite', tags: ['usersCars'])]
    #[SuccessNoContentResponse]
    public function __invoke(CarIdPathParameterData $carIdPathParameterData)
    {

        // $user_id = Auth::User()->id;

        $logged_user =
            User::query()
                ->firstWhere(
                    'id',
                    // $user_id
                    5
                );

        $car_id =
                $carIdPathParameterData
                    ->id;

        $logged_user
            ->favouriteCars()
            ->toggle($car_id);

    }
}
