<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Parameter\QueryParameter\ListQueryParameter;
use App\Data\Shared\Swagger\Parameter\QueryParameter\QueryParameter;
use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Car\CarListData;
use App\Data\User\Car\QueryParameters\SearchCarOfferQueryParameterData;
use App\Data\User\Car\SearchCarOfferPaginationResultData;
use App\Data\User\Car\SearchCarOfferResponseData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Builder as ScoutBuilder;
use OpenApi\Attributes as OAT;

use function Illuminate\Support\enum_value;

class SearchCarOfferController extends Controller
{
    #[OAT\Get(path: '/users/cars', tags: ['usersCars'])]
    #[QueryParameter('page', 'integer')]
    #[QueryParameter('per_page', 'integer')]
    #[QueryParameter('search')]
    #[QueryParameter('model')]
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
    #[QueryParameter('is_faragha_jahzeh')]
    #[QueryParameter('is_new_car')]
    #[QueryParameter('is_khalyeh')]
    #[QueryParameter('is_kassah')]
    #[QueryParameter('car_import_type')]
    #[ListQueryParameter('shippable_to')]
    #[SuccessItemResponse(SearchCarOfferPaginationResultData::class)]
    public function __invoke(SearchCarOfferQueryParameterData $request)
    {

        $request_search =
            $request
                ->search;

        $request_model =
            $request
                ->model;

        $request_shippable_to =
            $request->shippable_to;

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

        $request_is_faragha_jahzeh =
            $request
                ->is_faragha_jahzeh;

        $request_is_new_car =
            $request
                ->is_new_car;

        $request_is_khalyeh =
            $request
                ->is_khalyeh;

        $request_is_kassah =
            $request
                ->is_kassah;

        $request_import_type =
            $request
                ->import_type;

        $user_current_city =
            $request
                ->user_current_syrian_city;

        $is_request_search_set = $request_search != null;

        if (! $is_request_search_set) {

            $local_cars_search =
                Car::when(
                    $request_shippable_to,
                    fn (EloquentBuilder $query) => $query
                        ->whereHas(
                            'shippable_to',
                            fn (EloquentBuilder $query) => $query->whereIn('id', $request_shippable_to)
                        )
                )
                    // ->when(
                    //     $request_manufacturer_id,
                    //     fn (EloquentBuilder $query) => $query
                    //         ->where(
                    //             'manufacturer_id',
                    //             $request_manufacturer_id
                    //         )
                    // )
                    ->when(
                        $request_car_sell_location,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'car_sell_location',
                                $request_car_sell_location
                            )
                    )
                    ->when(
                        $request_year_manufactured,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'year_manufactured',
                                $request_year_manufactured
                            )
                    )
                    ->when(
                        $request_fuel_type,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'fuel_type',
                                $request_fuel_type
                            )
                    )
                    ->when(
                        $request_car_label_origin,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'car_label_origin',
                                $request_car_label_origin
                            )
                    )
                    ->when(
                        $request_user_has_legal_car_papers,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'user_has_legal_car_papers',
                                true
                            )
                    )
                    ->when(
                        $request_is_faragha_jahzeh,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'is_faragha_jahzeh',
                                $request_is_faragha_jahzeh
                            )
                    )
                    ->when(
                        $request_is_new_car,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'is_new_car',
                                $request_is_new_car
                            )
                    )
                    ->when(
                        $request_is_khalyeh,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'is_khalyeh',
                                $request_is_khalyeh
                            )
                    )
                    ->when(
                        $request_is_kassah,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'is_kassah',
                                $request_is_kassah
                            )
                    )
                    ->when(
                        $request_import_type,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'car_import_type',
                                $request_import_type
                            )
                    )
        // gets called on client side after remote query success
                    ->with('shippable_to')
                    ->paginate(2);
            // Storage::disk('app')->put('text2.php', 'before collection');

            return CarListData::collect($local_cars_search);
        }
        // Storage::disk('app')->put('text2.php', 'before remote call');

        // $cars_in_user_current_city =
        //     Car::query()
        //         ->where(
        //             'car_sell_location',
        //             $user_current_city
        //         );

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

        //get applied on remote side in addtion to when filters
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

        // if ($request->page) {
        // Storage::disk('app')->put('text2.php', $request->page);
        // }

        // Storage::disk('app')->put('text2.php', 'before remote call');

        $remote_cars_search =
            Car::search(
                $request_search
            )
                ->options([
                    'filters' => $query_filters, // used for where between or where greater or where smaller, because they are not avaialble in api nativley, gets merged with other filters below
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
                            enum_value($request_fuel_type)
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
                    $request_is_faragha_jahzeh,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'is_faragha_jahzeh',
                            $request_is_faragha_jahzeh
                        )
                )
                ->when(
                    $request_is_new_car,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'is_new_car',
                            $request_is_new_car
                        )
                )
                ->when(
                    $request_is_khalyeh,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'is_khalyeh',
                            $request_is_khalyeh
                        )
                )
                ->when(
                    $request_is_kassah,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'is_kassah',
                            $request_is_kassah
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
        //queryFn({paramPage}) pageParam parameter will be of this type (number | null), otherwise undefined and errors
        // gets called on client side after remote query success
                ->query(
                    fn (EloquentBuilder $query) => $query->with('shippable_to')
                )
                ->paginate(2);

        // Storage::disk('app')->put('text2.php', json_encode($remote_cars_search->items()));

        // Storage::disk('app')->put('text2.php', 'latest');

        return CarListData::collect($remote_cars_search);

        // /** @var Collection<int, Manufacturer> $manufacturers_with_car_offers */
        // $manufacturers_with_car_offers =
        //     Manufacturer::query()
        //         ->powerJoinHas('cars')
        //         ->get();

        // return SearchCarOfferResponseData::from([
        //     'paginated_cars_search_result' => CarListData::collect($remote_cars_search),
        //     'user_city_cars' => collect([]),
        //     // CarListData::collect($manufacturers_with_car_offers),
        // ]);

    }
}
