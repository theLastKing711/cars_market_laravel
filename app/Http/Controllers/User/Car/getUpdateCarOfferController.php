<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Car\getUpdateCarOfferResponseData;
use App\Data\User\Car\PathParameters\CarIdPathParameterData;
use App\Models\Car;
use OpenApi\Attributes as OAT;

#[
    OAT\PathItem(
        path: '/users/cars/updateDetails/{id}',
        parameters: [
            new OAT\PathParameter(
                ref: '#/components/parameters/usersCarIdPathParameterData',
            ),
        ],
    ),
]
class getUpdateCarOfferController extends CarController
{

    #[OAT\Get(path: '/users/cars/updateDetails/{id}', tags: ['usersCars'])]
    #[SuccessItemResponse(getUpdateCarOfferResponseData::class)]
    public function __invoke(CarIdPathParameterData $request_path_data)
    {
        $logged_user_id =
        5;
        // Auth::User()->id

        // return

        $request_car_id = $request_path_data->id;

        $car =
            Car::query()
                // ->selectRaw(
                //     '*, (select exists (select 1 from user_favourites_cars where cars.id = user_favourites_cars.car_id AND user_favourites_cars.user_id = ? ) ) as is_car_favourited_by_user',
                //     [$logged_user_id]
                // )
                ->whereId($request_car_id)
                ->with(
                    [
                        'medially',
                        'shippable_to',
                    ]
                )
                ->first();

        return getUpdateCarOfferResponseData::from($car);
    }
}
