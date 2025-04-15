<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Parameter\QueryParameter\QueryParameter;
use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Car\CarListData;
use App\Data\User\Car\QueryParameters\SearchMyCarQueryParameterData;
use App\Data\User\Car\SearchCarOfferPaginationResultData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OAT;

class SearchMyFavouriteCarsController extends Controller
{
    #[OAT\Get(path: '/users/cars/searchMyFavouriteCars', tags: ['usersCars'])]
    #[QueryParameter('search')]
    #[SuccessItemResponse(SearchCarOfferPaginationResultData::class)]
    public function __invoke(SearchMyCarQueryParameterData $request)
    {
        $request_search =
            $request
                ->search;

        $logged_user_id = Auth::User()?->id;

        if (! $request_search) {
            $local_car_search_result =
                Car
                    // ::selectRaw(

                    //     '*, (select exists (select 1 from user_favourites_cars where user_id=? AND car_id=cars.id)) as is_favourite',
                    //     [$logged_user_id]
                    // )
                    ::selectRaw('*, true as is_favourite')
                    // ->whereUserId($logged_user_id)
                        ->has('favourited_by_users')
                        ->with([
                            'medially' => fn ($comments) => $comments->take(1),
                        ])
                        ->paginate(2);

            return CarListData::collect($local_car_search_result);
        }

        $remote_car_search_result =
            Car::search($request_search)
                ->whereIn('favourited_by_users', [$logged_user_id])
                ->query(
                    fn ($query) => $query
                        ->with([
                            'medially' => fn ($comments) => $comments->take(1),
                        ])
                )
                ->paginate(3);

        $paginator = tap($remote_car_search_result, function ($paginatedInstance) use ($logged_user_id) {
            return $paginatedInstance->getCollection()->transform(function ($model) use ($logged_user_id) {
                return CarListData::fromModel($model, $logged_user_id);
            });
        });

        return $paginator;

    }
}
