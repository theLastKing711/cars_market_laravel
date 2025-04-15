<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Parameter\QueryParameter\ListQueryParameter;
use App\Data\Shared\Swagger\Parameter\QueryParameter\QueryParameter;
use App\Data\Shared\Swagger\Response\SuccessItemResponse;
use App\Data\User\Car\CarListData;
use App\Data\User\Car\QueryParameters\SearchCarOfferQueryParameterData;
use App\Data\User\Car\SearchCarOfferPaginationResultData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Scout\Builder as ScoutBuilder;
use OpenApi\Attributes as OAT;

use function Illuminate\Support\enum_value;

class SearchCarOfferController extends Controller
{
    #[OAT\Get(path: '/users/cars', tags: ['usersCars'])]
    #[QueryParameter('page', 'integer')]
    #[QueryParameter('per_page', 'integer')]
    #[QueryParameter('search')]
    #[QueryParameter('price_from')]
    #[QueryParameter('price_to')]
    #[QueryParameter('car_sell_location')]
    #[QueryParameter('year_manufactured')]
    #[QueryParameter('fuel_type')]
    #[QueryParameter('transmission')]
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

        Log::info($request);

        $request_search =
            $request
                ->search;

        $request_shippable_to =
            $request->shippable_to;

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

        $request_transmission =
            $request
                ->transmission;

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
            str_contains($request->search, 'مستعملة')
            ||
            str_contains($request->search, 'مستعمل')
            ?
            true
            :
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

        // $logged_user_id = Auth::User()->id;

        $logged_user_id = Auth::User()?->id;

        if (! $is_request_search_set) {

            $local_cars_search =
                Car::query()
                    ->when(
                        ! $logged_user_id,
                        fn (EloquentBuilder $query) => $query->selectRaw(
                            '*, false as is_favourite'
                        ),
                        fn (EloquentBuilder $query) => $query
                            ->selectRaw(
                                '*,(select exists (select 1 from user_favourites_cars where user_id=? AND car_id=cars.id)) as is_favourite',
                                [$logged_user_id]
                            )
                    )
                    ->when(
                        $request_shippable_to,
                        fn (EloquentBuilder $query) => $query
                            ->whereHas(
                                'shippable_to',
                                fn (EloquentBuilder $query) => $query->whereIn('id', $request_shippable_to)
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
                        $request_transmission,
                        fn (EloquentBuilder $query) => $query
                            ->where(
                                'transmission',
                                $request_transmission
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
                    ->when(
                        $request_price_from,
                        fn (EloquentBuilder $query) => $query
                            ->whereBetween(
                                'car_price',
                                [$request_price_from, $request_price_to]
                            )
                    )
                    ->when(
                        $request_miles_travelled_in_km_from,
                        fn (EloquentBuilder $query) => $query
                            ->whereBetween(
                                'miles_travelled_in_km',
                                [
                                    $request_miles_travelled_in_km_from,
                                    $request_miles_travelled_in_km_to,
                                ]
                            )
                    )
                    // gets called on client side after remote query success
                    ->with([
                        'medially' => fn ($comments) => $comments->take(1),
                        'favourited_by_users',
                    ])
                    ->paginate(10);

            return CarListData::collect($local_cars_search);
        }

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

        // get applied on remote side in addtion to when filters
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
                    $request_transmission,
                    fn (ScoutBuilder $query) => $query
                        ->where(
                            'transmission',
                            enum_value($request_transmission)
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
    // gets called on client side after remote query success
                ->query(
                    fn (EloquentBuilder $query) => $query
                        ->with([
                            'medially' => fn ($comments) => $comments->take(1),
                            'favourited_by_users',
                        ])
                )
                ->paginate(5);

        $paginator = tap($remote_cars_search, function ($paginatedInstance) use ($logged_user_id) {
            return $paginatedInstance->getCollection()->transform(function ($model) use ($logged_user_id) {
                return CarListData::fromModel($model, $logged_user_id);
            });
        });

        return $paginator;

    }
}
