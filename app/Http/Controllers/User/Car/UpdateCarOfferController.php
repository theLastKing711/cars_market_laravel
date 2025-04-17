<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\Car\PathParameters\CarIdPathParameterData;
use App\Data\User\Car\UpdateCarOfferRequestData;
use App\Models\Car;
use App\Services\Api\TranslationService;
use OpenApi\Attributes as OAT;

class UpdateCarOfferController extends CarController
{
    #[OAT\Patch(path: '/users/cars/{id}', tags: ['usersCars'])]
    #[JsonRequestBody(UpdateCarOfferRequestData::class)]
    #[SuccessNoContentResponse]
    public function __invoke(
        UpdateCarOfferRequestData $updateCarOfferRequestData,
        CarIdPathParameterData $path_data,
        TranslationService $translationService
    ) {

        $car_translation_set =
                $translationService
                    ->translate($updateCarOfferRequestData->name_ar);

        $request_car_id = $path_data->id;

        $car_to_update =
            Car::query()
                ->where('id', $request_car_id)
                ->update([
                    'car_name_language_when_uploaded' => $car_translation_set->upload_language,
                    'name_ar' => $car_translation_set->name_ar,
                    'name_en' => $car_translation_set->name_en,
                    'is_new_car' => $updateCarOfferRequestData->is_new_car,
                    'car_price' => $updateCarOfferRequestData->car_price,
                    'fuel_type' => $updateCarOfferRequestData->fuel_type,
                    'transmission' => $updateCarOfferRequestData->transmission,
                    'miles_travelled_in_km' => $updateCarOfferRequestData->miles_travelled_in_km,
                    'is_kassah' => $updateCarOfferRequestData->is_kassah,
                    'is_khalyeh' => $updateCarOfferRequestData->is_khalyeh,
                    'is_faragha_jahzeh' => $updateCarOfferRequestData->is_faragha_jahzeh,
                ]);

    }
}
