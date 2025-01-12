<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Parameter\QueryParameter\QueryParameter;
use App\Data\Shared\Swagger\Response\SuccessListResponse;
use App\Data\User\Car\ManufacturerListResponseData;
use App\Data\User\Car\QueryParameters\SearchOfferQueryParameterData;
use App\Data\User\Car\SearchCarOfferResponseData;
use App\Enum\ImportType;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Laravel\Scout\Builder as ScoutBuilder;
use OpenApi\Attributes as OAT;

class SearchCarOfferController extends Controller
{
    #[OAT\Get(path: '/users/cars', tags: ['usersCars'])]
    #[QueryParameter('search')]
    #[QueryParameter('manufacturer_id')]
    #[QueryParameter('price_from')]
    #[QueryParameter('price_to')]
    #[QueryParameter('car_sell_location')]
    #[QueryParameter('year_manufactured')]
    #[QueryParameter('fuel_type')]
    #[QueryParameter('car_label_origin')]
    #[QueryParameter('miles_travelled_in_km_from')]
    #[QueryParameter('miles_travelled_in_km_to')]
    #[QueryParameter('user_has_legal_car_papers')]
    #[QueryParameter('faragha_jahzeh')]
    #[QueryParameter('car_import_type')]
    #[SuccessListResponse(SearchCarOfferResponseData::class)]
    public function __invoke(SearchOfferQueryParameterData $request)
    {

        $request_search =
            $request
                ->search;

        // return Car::with('shippable_to')
        //     ->get();

        $request_shippable_to =
            $request->shippable_to;

        // $is_car_shippable_to_different_cities =
        // count($request_shippable_to);

        $request_manufacturer_id =
        $request
            ->manufacturer_id;

        $request_price_from =
            $request
                ->price_from;

        $request_price_to =
            $request
                ->price_to;

        $request_car_sell_location =
            $request
                ->car_sell_location;

        $request_year_manufactured =
            $request
                ->year_manufactured;

        $request_fuel_type =
            $request
                ->fuel_type;

        $request_car_label_origin =
            $request
                ->car_label_origin;

        $request_miles_travelled_in_km_from
            =
            $request
                ->miles_travelled_in_km_from;

        $request_miles_travelled_in_km_to
            = $request
                ->miles_travelled_in_km_to;

        $request_user_has_legal_car_papers =
            $request
                ->user_has_legal_car_papers;

        $request_faragha_jahzeh =
            $request
                ->faragha_jahzeh;

        $request_import_type =
            $request
                ->import_type;

        $user_current_city =
            $request
                ->user_current_syrian_city;

        // $cars_in_user_current_city =
        //     Car::query()
        //         ->where(
        //             'car_sell_location',
        //             $user_current_city
        //         );

        Log::info($request_price_from);

        $is_request_price_from_available =
            $request_price_from !== null;

        $car_price_from_query =
        $is_request_price_from_available ?
            'car_price:'.
            (string) $request_price_from.
            ' TO '.
            (string) $request_price_to
            :
            '';

        $is_request_price_to_available =
            $request_price_to != null;

        $is_request_car_travelled_from_km_available =
            $request_miles_travelled_in_km_from !== null;

        $car_travelled_in_km_query =
            $is_request_car_travelled_from_km_available ?
            'miles_travelled_in_km:'.
            (string) $request_miles_travelled_in_km_from.
            ' TO '.
            (string) $request_miles_travelled_in_km_to
            :
            '';

        $query_filters =
            $car_price_from_query && $car_travelled_in_km_query
            ?
            $car_price_from_query.' AND '.$car_travelled_in_km_query
            :
            $car_price_from_query.$car_travelled_in_km_query;

        // $car_price_to_query =
        //     $is_request_price_to_available ?
        //         'car_price <=' . $request_price_to
        //         :
        //         '';

        return
            Car::search(
                $request_search
            )
                ->options([
                    'filters' => $query_filters,
                    // 'restrictSearchableAttributes' => [ // potinal performance imporvment, in dashboad configuration -> add tosearchable attributes for it to work
                    //     'manufacturer_ar',
                    // ],
                ])
                ->when(
                    $request_shippable_to,
                    fn (ScoutBuilder $query) => $query->whereIn('city', $request_shippable_to)
                )
                ->when(
                    $request_manufacturer_id,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'manufacturer_id',
                            $request_manufacturer_id
                        )
                )
                ->when(
                    $request_car_sell_location,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'car_sell_location',
                            $request_car_sell_location
                        )
                )
                ->when(
                    $request_year_manufactured,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'year_manufactured',
                            $request_year_manufactured
                        )
                )
                ->when(
                    $request_fuel_type,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'fuel_type',
                            $request_fuel_type
                        )
                )
                ->when(
                    $request_car_label_origin,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'car_label_origin',
                            $request_car_label_origin
                        )
                )
                ->when(
                    $request_user_has_legal_car_papers,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'user_has_legal_car_papers',
                            true
                        )
                )
                ->when(
                    $request_faragha_jahzeh,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'faragha_jahzeh',
                            $request_faragha_jahzeh
                        )
                )
                ->when(
                    $request_import_type,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'car_import_type',
                            $request_import_type
                        )
                )
            //get executed after we get the result from remote fulltext search
                ->query(
                    fn (EloquentBuilder $query) => $query->with('shippable_to')
                )
                ->get();

        /** @var Collection<int, Manufacturer> $manufacturers_with_car_offers */
        $manufacturers_with_car_offers =
            Manufacturer::query()
                ->powerJoinHas('cars')
                ->get();

        $manufacturers_with_car_offers_data =
            ManufacturerListResponseData::collect(
                $manufacturers_with_car_offers
            );

        // $new_europian_imported_cars =
        //     Car::query()
        //         ->where(
        //             'car_import_type',
        //             ImportType::EuropeNew
        //         );

        ////https://www.algolia.com/doc/api-reference/search-api-parameters/
        // return Car::search(
        //     $request->search,
        // )
        //     ->options([
        //         'optionalWords' => [ // if a record is corolla and query is toyota corllola return true, would be false withot this parameter
        //             'تويوتا',
        //         ],
        //     ])
        //     ->get();

    }
}
