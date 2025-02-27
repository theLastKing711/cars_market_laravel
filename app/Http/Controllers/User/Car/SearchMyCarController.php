<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Parameter\QueryParameter\QueryParameter;
use App\Data\Shared\Swagger\Response\SuccessListResponse;
use App\Data\User\Car\CarListData;
use App\Data\User\Car\QueryParameters\SearchMyCarQueryParameterData;
use App\Data\User\Car\SearchMyCarData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use OpenApi\Attributes as OAT;

class SearchMyCarController extends Controller
{
    #[OAT\Get(path: '/users/cars/searchMyCars', tags: ['usersCars'])]
    #[QueryParameter('page', 'integer')]
    #[QueryParameter('per_page', 'integer')]
    #[QueryParameter('search')]
    #[SuccessListResponse(SearchMyCarData::class)]
    public function __invoke(SearchMyCarQueryParameterData $request)
    {
        $request_search =
            $request
                ->search;

        if (! $request_search) {
            $remote_car_search_result =
                Car::simplePaginate(2);

            return CarListData::collect($remote_car_search_result);
        }

        $remote_car_search_result =
            Car::search($request_search)
                ->simplePaginate(2);

        return CarListData::collect($remote_car_search_result);

    }
}
