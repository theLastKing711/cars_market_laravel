<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Car\CarOfferDetailsRespnseData;
use App\Data\User\Car\PathParameters\CarIdPathParameterData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use OpenApi\Attributes as OAT;

class CarOfferDetailsController extends Controller
{
    #[OAT\Get(path: '/users/cars/{id}', tags: ['usersCars'])]
    #[SuccessItemResponse(CarOfferDetailsRespnseData::class)]
    public function __invoke(CarIdPathParameterData $request)
    {

        $logged_user_id =
            5;
        // Auth::User()->id

        // return

        $car =
            Car::query()
                // ->selectRaw(
                //     '*, (select exists (select 1 from user_favourites_cars where cars.id = user_favourites_cars.car_id AND user_favourites_cars.user_id = ? ) ) as is_car_favourited_by_user',
                //     [$logged_user_id]
                // )
                ->whereId($request->id)
                ->with(
                    [
                        'medially',
                        'shippable_to',
                    ]
                )
                ->first();

        return CarOfferDetailsRespnseData::from($car);

    }
}
