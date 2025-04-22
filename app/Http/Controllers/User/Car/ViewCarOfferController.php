<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OAT;

class ViewCarOfferController extends Controller
{
    #[OAT\Post(path: '/users/cars/viewCarOffer', tags: ['usersCars'])]
    #[SuccessNoContentResponse]
    public function __invoke()
    {

        $logged_user_id = Auth::User()->id;

        Car::query()
            ->where(
                'id',
                $logged_user_id
            )
            ->increment('views');

    }
}
