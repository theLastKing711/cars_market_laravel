<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Car\CarOfferDetailsResponseData;
use App\Data\User\Car\PathParameters\CarIdPathParameterData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use App\Notifications\UserCalled;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OAT;

// messente
// curl -X POST \
//   'https://api.messente.com/v1/omnimessage' \
//   -u 43e4868bb6b54475a8000e5a4a4e4d88:401ee2fdab834eb49813800dd024f7c7 \
//   -H 'Content-Type: application/json' \
//   -d '{
//     "to": "+963968316079",
//     "messages": [
//       {
//         "channel": "sms",
//         "sender": "Cars Kingdom",
//         "text": "hello sms"
//       }
//     ]
//   }'

// return Http::get('https://api.labsmobile.com/get/send', [
//     'username' => 'besherjeiroudi@digitaldomain.site',
//     'password' => 'DAUck5c8oEoOoFqgCLl8aAzRCWPOPQUj',
//     'msisdn' => '963968316079',
//     'message' => 'hello wolrd',
// ]);

// 3xmxCfnF9tV7or4cSR9XZpt90Djh2fLPDPvU0LW7

// 963968316079
// 12164740961
class CarOfferDetailsController extends Controller
{
    #[OAT\Get(path: '/users/cars/{id}', tags: ['usersCars'])]
    #[SuccessItemResponse(CarOfferDetailsResponseData::class)]
    public function __invoke(CarIdPathParameterData $request)
    {

        Log::info('hello world');

        $request_car_id = $request->id;

        $logged_user_id = Auth::User()?->id;

        /** @var User $car_owner */
        $car_owner =
            tap(
                Car::query()
                    ->where(
                        'id',
                        $request_car_id
                    ),
                function ($query) {
                    $query->increment('views');
                }
            )
                ->first()
                ->user;

        $car_owner->notify(new UserCalled);

        $car =
            Car::query()
                ->with('user:id')
                ->whereId($request->id)
                ->when(
                    $logged_user_id,
                    fn ($query) => $query->selectRaw(
                        '*, (select exists (select 1 from user_favourites_cars where user_id=? AND car_id=?)) as is_favourite',
                        [$logged_user_id, $request_car_id]
                    )
                )
                ->when(
                    ! $logged_user_id,
                    fn ($query) => $query->selectRaw(
                        '*, false as is_favourite')
                )
                ->with(
                    [
                        'medially',
                        'shippable_to',
                        'user' => fn ($query) => $query
                            ->select('id', 'fcm_token', 'phone_number', 'max_number_of_car_upload'),
                    ]
                )
                ->first();

        return CarOfferDetailsResponseData::from($car);

    }
}
