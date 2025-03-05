<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Car\CarOfferDetailsResponseData;
use App\Data\User\Car\PathParameters\CarIdPathParameterData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use OpenApi\Attributes as OAT;

class CarOfferDetailsController extends Controller
{
    #[OAT\Get(path: '/users/cars/{id}', tags: ['usersCars'])]
    #[SuccessItemResponse(CarOfferDetailsResponseData::class)]
    public function __invoke(CarIdPathParameterData $request)
    {
        $request_car_id = $request->id;


        $logged_user_id =
            5;
        // Auth::User()->id

        // return

        $car =
            Car::query()
                ->whereId($request->id)
                 ->selectRaw(
                        '*, (select exists (select 1 from user_favourites_cars where user_id=? AND car_id=?)) as is_favourite',
                        [$logged_user_id, $request_car_id]
                    )
                ->with(
                    [
                        'medially',
                        'shippable_to',
                    ]
                )
                ->first();

        return CarOfferDetailsResponseData::from($car);

    }
}
