<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\Car\CreateCarOfferRequestData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OAT;

class CreateCarOfferController extends Controller
{
    #[OAT\Post(path: '/users/cars', tags: ['usersCars'])]
    #[JsonRequestBody(CreateCarOfferRequestData::class)]
    #[SuccessNoContentResponse]
    public function __invoke(CreateCarOfferRequestData $createCarOfferRequestData, Request $request)
    {

        Log::info('request {request}', ['request' => $createCarOfferRequestData]);

        $uploaded_car_images_session_key =
            config('constants.session.upload_car_images');

        /** @var string[] $user_uploaded_car_images */
        $user_car_medias =
            $request
                ->session()
                ->get($uploaded_car_images_session_key);

        // $logged_user_id = Auth::User()->id;

        DB::transaction(function () use ($createCarOfferRequestData, $user_car_medias) {

            $car_manufacturer_name_en = config('constants.cars');

            $car = Car::query()
                ->create([
                    // 'user_id' => $logged_user_id,
                    'user_id' => 1,
                    'name_ar' => $createCarOfferRequestData->name_ar,
                    // 'manufacturer_name_en' => $createCarOfferRequestData->name_en,
                    'is_new_car' => $createCarOfferRequestData->is_new_car,
                    'car_price' => $createCarOfferRequestData->car_price,
                    'fuel_type' => $createCarOfferRequestData->fuel_type,
                    'transmission' => $createCarOfferRequestData->transmission,
                    'miles_travelled_in_km' => $createCarOfferRequestData->miles_travelled_in_km,
                    'is_faragha_jahzeh' => $createCarOfferRequestData->is_faragha_jahzeh,
                    'is_kassah' => $createCarOfferRequestData->is_kassah,
                    'is_khalyeh' => $createCarOfferRequestData->is_khalyeh,
                ]);

            $car
                ->medially()
                ->saveMany($user_car_medias);

            $logged_user_id = 5;

            User::query()
                ->firstWhere(
                    'id',
                    $logged_user_id
                )
                ->decrement('max_number_of_car_upload');

            // Auth::User()
            //     ->increment('max_number_of_car_upload');

        });

        $request
            ->session()
            ->remove($uploaded_car_images_session_key);

        return 1;
    }
}
