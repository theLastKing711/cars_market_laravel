<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Parameter\QueryParameter\QueryParameter;
use App\Data\Shared\Swagger\Response\SuccessListResponse;
use App\Data\User\Car\CarListData;
use App\Data\User\Car\QueryParameters\SearchMyCarQueryParameterData;
use App\Data\User\Car\SearchMyCarData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OAT;

class SearchMyCarController extends Controller
{
    #[OAT\Get(path: '/users/cars/searchMyCars', tags: ['usersCars'])]
    #[QueryParameter('page', 'integer')]
    #[QueryParameter('per_page', 'integer')]
    #[QueryParameter('search')]
    #[SuccessListResponse(CarListData::class)]
    public function __invoke(SearchMyCarQueryParameterData $request)
    {
        $request_search =
            $request
                ->search;

        $logged_user_id = Auth::User()->id;

        if (! $request_search) {

            $local_car_search_result =
                Car::query()
                    ->where('user_id', $logged_user_id)
                    ->selectRaw(
                        '
                            *,
                            (select exists (select 1 from user_favourites_cars where user_id=? AND car_id=cars.id)) as is_favourite
                        ',
                        [$logged_user_id]
                    )
                    ->isNotSold()
                    ->with([
                        'medially' => fn ($comments) => $comments->take(1),
                    ])
                    ->paginate(2);

            return SearchMyCarData::collect($local_car_search_result);
        }

        $remote_car_search_result =
            Car::search($request_search)
                ->where('user_id', $logged_user_id)
                ->query(
                    fn (Builder $query) => $query
                        ->with([
                            'medially' => fn ($comments) => $comments->take(1),
                        ])
                )
                ->paginate(2);

        return SearchMyCarData::collect($remote_car_search_result);

        // $paginator = tap($remote_car_search_result, function ($paginatedInstance) {
        //     return $paginatedInstance->getCollection()->transform(function ($model) {
        //         return SearchMyCarData::fromModel($model);
        //     });
        // });

        // return $paginator;
    }
}
