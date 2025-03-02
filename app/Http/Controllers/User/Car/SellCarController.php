<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\Car\PathParameters\CarIdPathParameterData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OAT;

// #[
//     OAT\PathItem(
//         path: '/users/cars/{id}',
//         parameters: [
//             new OAT\PathParameter(
//                 ref: '#/components/parameters/usersCarIdPathParameterData',
//             ),
//         ],
//     ),
// ]
class SellCarController extends Controller
{
    #[OAT\Get(path: '/users/cars/sell/{id}', tags: ['usersCars'])]
    #[SuccessNoContentResponse]
    public function __invoke(CarIdPathParameterData $carIdPathParameterData)
    {

        Log::info('hello world');

        return true;

        $car_id =
            $carIdPathParameterData
                ->id;

        $cars =
            Car::query()
                ->where(
                    'id',
                    $car_id
                )
                ->update([
                    'is_sold' => true,
                ]);

    }
}
