<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\Car\CreateCarOfferRequestData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Media;
use App\Models\TemporaryUploadedImages;
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

        // $uploaded_car_images_session_key =
        //     config('constants.session.upload_car_images');

        // /** @var string[] $user_car_medias */
        // $user_car_medias =
        //     $request
        //         ->session()
        //         ->get($uploaded_car_images_session_key);

        $logged_user = Auth::User();

        DB::transaction(function () use ($createCarOfferRequestData, $translationService, $logged_user) {

            $car_translation_set =
                $translationService
                    ->translate($createCarOfferRequestData->name_ar);

            Log::info($createCarOfferRequestData);

            $car = Car::query()
                ->create([
                    'user_id' => $logged_user->id,
                    'car_upload_start_date' => now(),
                    'car_upload_expiration_date' => now()->addYear(1),
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

            $user_car_temporary_uploaded_images =
                TemporaryUploadedImages::query()
                    ->where(
                        'user_id',
                        $logged_user->id
                    );

            $user_car_medias =
                $user_car_temporary_uploaded_images
                    ->get()
                    ->map(function ($temporary_uploaded_image) {
                        $media = new Media;
                        $media->file_name = $temporary_uploaded_image->file_name;
                        $media->file_url = $temporary_uploaded_image->file_url;
                        $media->size = $temporary_uploaded_image->size;
                        $media->file_type = $temporary_uploaded_image->file_type;
                    });

            $car
                ->medially()
                ->saveMany($user_car_medias);

            $user_car_temporary_uploaded_images
                ->delete();

            $logged_user::decrement('max_number_of_car_upload');

        });

        // $request
        //     ->session()
        //     ->remove($uploaded_car_images_session_key);

        // Log::info('logged user id {logged_user_id}', ['logged_user_id' => ]);

        // $request
        //     ->session()
        //     ->remove($uploaded_car_images_session_key);

        // Log::info('logged user id {logged_user_id}', ['logged_user_id' => $logged_user_id]);

        return 1;
    }
}
