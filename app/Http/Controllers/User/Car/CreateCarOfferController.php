<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\Car\CreateCarOfferRequestData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OAT;

class CreateCarOfferController extends Controller
{
    #[OAT\Post(path: '/users/cars', tags: ['users'])]
    #[JsonRequestBody(CreateCarOfferRequestData::class)]
    #[SuccessNoContentResponse]
    public function __invoke(CreateCarOfferRequestData $request)
    {

        Log::info($request);

        Car::query()
            ->create([
                'manufacturer_id' => 25,
                'user_id' => $request->user_id,
                'is_new_car' => $request->is_new_car,
                'model' => $request->model,
                'year_manufactured' => $request->year_manufactured,
                'car_color' => $request->car_color,
                'description' => $request->description,
                'car_price' => $request->car_price,
                'car_sell_currency' => $request->car_sell_currency,
                'fuel_type' => $request->fuel_type,
                'car_sell_location' => $request->car_sell_location,
                'is_car_shippable_to_a_different_city' => $request->is_car_shippable_to_a_different_city,
                'car_import_type' => $request->car_import_type,
                'car_label_origin' => $request->car_label_origin,
                'transmission' => $request->transmission,
                'miles_travelled_in_km' => $request->miles_travelled_in_km,
                'has_tuf_check_passed' => $request->has_tuf_check_passed,
                'user_has_legal_car_papers' => $request->user_has_legal_car_papers,
                'faragha_jahzeh' => $request->faragha_jahzeh,
                'is_tajrobeh' => $request->is_tajrobeh,
            ]);

        return [];
    }
}
