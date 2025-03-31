<?php

namespace App\Http\Controllers\User\Auth;

use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\Auth\CreatePasswordRequestData;
use App\Data\User\Auth\RegisterResponseData;
use App\Http\Controllers\Controller;
use App\Models\User;
use OpenApi\Attributes as OAT;

class CreatePasswordController extends Controller
{
    #[OAT\Post(path: '/users/auth/create-password', tags: ['usersAuth'])]
    #[JsonRequestBody(CreatePasswordRequestData::class)]
    #[SuccessNoContentResponse]
    public function __invoke(CreatePasswordRequestData $createPasswordRequestData)
    {

        $request_phone_number = $createPasswordRequestData->phone_number;

        $token =
            User::query()
                ->create([
                    'country_code' => '963',
                    'phone_number' => $request_phone_number,
                    'password' => $createPasswordRequestData->password,
                    'max_number_of_car_upload' => 0,
                    'subscription_id' => 1,
                ])
                ->createToken($request_phone_number);

        return response(
            new RegisterResponseData($token->plainTextToken),
            201
        );

    }
}
