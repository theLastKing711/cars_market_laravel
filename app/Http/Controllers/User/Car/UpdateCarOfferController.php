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
class UpdateCarOfferController extends Controller
{
    public function __invoke(UpdateCarOfferRequestData $request, CarIdPathParameterData $path_data)
    {

        $request_car_id = $path_data->id;

        $car_to_update =
            Car::query()
                ->where('id', $request_car_id)
                ->update([
                    'name_ar' => $request->name_ar,
                    'is_new_car' => $request->is_new_car,
                    'car_price' => $request->car_price,
                    'fuel_type' => $request->fuel_type,
                    'transmission' => $request->transmission,
                    'miles_travelled_in_km' => $request->miles_travelled_in_km,
                    'is_faragha_jahzeh' => $request->is_faragha_jahzeh,
                    'is_khalyeh' => $request->is_khalyeh,
                ]);

        return 1;
    }
}
