<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Car\GetUserMaxCarUploadResponseData;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OAT;

class GetUserMaxCarUploadController extends Controller
{
    #[OAT\Get(path: '/users/cars/maxCarUpload', tags: ['usersCars'])]
    #[SuccessItemResponse(GetUserMaxCarUploadResponseData::class)]
    public function __invoke()
    {

        $logged_user_id = Auth::User()->id;

        $user_max_allowed_car_upload =
            User::query()
                ->firstWhere(
                    'id',
                    $logged_user_id
                )
                ->max_number_of_car_upload;

        return new GetUserMaxCarUploadResponseData(max_number_of_car_upload: $user_max_allowed_car_upload);

    }
}
