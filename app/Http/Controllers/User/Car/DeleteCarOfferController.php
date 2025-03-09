<?php

namespace App\Http\Controllers\User\Car;

use App\Http\Controllers\Controller;
;
use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\Car\PathParameters\CarIdPathParameterData;
use App\Models\Car;
use Illuminate\Support\Facades\DB;
use OpenApi\Attributes as OAT;


class DeleteCarOfferController extends CarController
{
    #[OAT\Delete(path: '/users/cars/{id}', tags: ['usersCars'])]
    #[SuccessNoContentResponse]
    public function __invoke(CarIdPathParameterData $request_path_data)
    {
        $request_car_id =
            $request_path_data
                ->id;

        /** @var Car $car */
        $car = Car::whereId($request_car_id)->first();

        DB::transaction(function() use ($car){

            defer(fn () => $car->detachMedia());
            // $car->detachMedia();


            $car->delete();
        });


    }
}
