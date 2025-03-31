<?php

namespace App\Http\Controllers\User\Auth;

use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Auth\RegisterRequestData;
use App\Data\User\Auth\RegisterResponseData;
use App\Http\Controllers\Controller;
use App\Models\User;
use Cloudinary\Api\HttpStatusCode;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OAT;

class RegisterController extends Controller
{
    #[OAT\Post(path: '/users/auth/register', tags: ['usersAuth'])]
    #[JsonRequestBody(RegisterRequestData::class)]
    #[SuccessItemResponse(RegisterResponseData::class)]
    public function __invoke(RegisterRequestData $request)
    {

        $request_phone_number = $request->phone_number;

        $is_phone_number_duplicated =
                User::where('phone_number', $request_phone_number)
                    ->exists();

        Log::info('phone number {phone_number}', ['phone_number' => $is_phone_number_duplicated]);

        if ($is_phone_number_duplicated) {
            return response(
                [
                    'message' => 'The phone number has already been taken.',
                    'errors' => [
                        'phone_number' => [
                            'The phone number has already been taken.',
                        ],
                    ],
                ],
                HttpStatusCode::CONFLICT
            );
        }

        // $user_has_phone_number_but_not_password_yet =
        //     User::query()
        //         ->firstWhere(
        //             [
        //                 'password' => null,
        //                 'phone_number' => $request_phone_number,
        //             ]
        //         )
        //         ->exists();

        // if ($user_has_phone_number_but_not_password_yet) {

        return response(
            [
                'message' => 'Success',
            ],
            HttpStatusCode::OK
        );
        // }

    }
}
