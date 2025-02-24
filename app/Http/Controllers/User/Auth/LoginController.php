<?php

namespace App\Http\Controllers\User\Auth;

use App\Data\Admin\User\Auth\LoginSuccessResponseData;
use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\FailureAuthenticationFailedResponse;
use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Auth\LoginData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OAT;

class LoginController extends Controller
{
    #[OAT\Post(path: '/users/auth/login', tags: ['usersAuth'])]
    // #[JsonRequestBody(LoginData::class)]
    // #[SuccessItemResponse(LoginSuccessResponseData::class)]
    #[FailureAuthenticationFailedResponse]
    public function __invoke(Request $request)
    {
        Log::info(
            'accessing User login method with dial_code {dial_code} and number {number}',
            [
                // 'dial_code' => $request->dial_code,
                // 'number' => $request->number,
            ]
        );
    }
}
