<?php

namespace App\Http\Controllers\User\Auth;

use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Auth\RegisterResponseData;
use App\Data\User\Auth\VerifyPasswordRequestData;
use App\Http\Controllers\Controller;
use App\Models\User;
use Cloudinary\Api\HttpStatusCode;
use Illuminate\Support\Facades\Hash;
use OpenApi\Attributes as OAT;

class VerifyPasswordController extends Controller
{
    #[OAT\Post(path: '/users/auth/verify-password', tags: ['usersAuth'])]
    #[JsonRequestBody(VerifyPasswordRequestData::class)]
    #[SuccessItemResponse(RegisterResponseData::class)]
    public function __invoke(VerifyPasswordRequestData $verifyPasswordRequestData)
    {

        $request_phone_number =
            $verifyPasswordRequestData->phone_number;

        $authenticated_user =
            User::query()
                ->firstWhere(
                    [
                        'phone_number' => $request_phone_number,
                    ]
                );

        if ($authenticated_user && ! Hash::check($verifyPasswordRequestData->password, $authenticated_user->password)) {

            return response(
                [
                    'message' => 'كلمة المرور لرقم الهاتف غير صحيحة',
                ],
                HttpStatusCode::UNAUTHORIZED
            );
        }

        $token =
            $authenticated_user
                ->createToken($request_phone_number);

        return response(
            new RegisterResponseData($token->plainTextToken),
            200
        );

    }
}
