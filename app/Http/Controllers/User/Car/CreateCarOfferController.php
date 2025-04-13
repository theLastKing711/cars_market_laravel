<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\Car\CreateCarOfferRequestData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use App\Services\Api\TranslationService;
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
    public function __invoke(CreateCarOfferRequestData $createCarOfferRequestData, Request $request, TranslationService $translationService)
    {

        // Log::info('createCarOfferController  {data}', ['data' => $createCarOfferRequestData]);

        $uploaded_car_images_session_key =
            config('constants.session.upload_car_images');

        /** @var string[] $user_car_medias */
        $user_car_medias =
            $request
                ->session()
                ->get($uploaded_car_images_session_key);

        $logged_user_id = Auth::User()->id;

        Log::info($logged_user_id);

        DB::transaction(function () use ($createCarOfferRequestData, $translationService, $user_car_medias, $logged_user_id) {

            $car_translation_set =
                $translationService
                    ->translate($createCarOfferRequestData->name_ar);

            $car = Car::query()
                ->create([
                    'user_id' => $logged_user_id,
                    'car_upload_start_date' => now(),
                    'car_upload_expiration_date' => now()->addYear(1),
                    'user_id' => 1,
                    'car_name_language_when_uploaded' => $car_translation_set->upload_language,
                    'name_ar' => $car_translation_set->name_ar,
                    'name_en' => $car_translation_set->name_en,
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

            User::query()
                ->firstWhere(
                    'id',
                    $logged_user_id
                )
                ->decrement('max_number_of_car_upload');

        });

        $request
            ->session()
            ->remove($uploaded_car_images_session_key);

        // Log::info('logged user id {logged_user_id}', ['logged_user_id' => ]);

        // $request
        //     ->session()
        //     ->remove($uploaded_car_images_session_key);

        // Log::info('logged user id {logged_user_id}', ['logged_user_id' => $logged_user_id]);

        return 1;
    }
}
