<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\Swagger\Parameter\QueryParameter\QueryParameter;
use App\Data\Shared\Swagger\Response\SuccessListResponse;
use App\Data\User\Car\ManufacturerListResponseData;
use App\Data\User\Car\QueryParameters\SearchOfferQueryParameterData;
use App\Data\User\Car\SearchOfferResponseData;
use App\Enum\ImportType;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
    #[SuccessListResponse(SearchOfferResponseData::class)]
    public function __invoke(SearchOfferQueryParameterData $request)
    {
        $request_search =
            $request
                ->search;

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

        $cars_in_user_current_city =
            Car::query()
                ->where(
                    'car_sell_location',
                    $user_current_city
                );

        /** @var Collection<int, Manufacturer> $manufacturers_with_car_offers */
        $manufacturers_with_car_offers =
            Manufacturer::query()
                ->powerJoinHas('cars')
                ->get();

        $manufacturers_with_car_offers_data =
            ManufacturerListResponseData::collect(
                $manufacturers_with_car_offers
            );

        $new_europian_imported_cars =
            Car::query()
                ->where(
                    'car_import_type',
                    ImportType::EuropeNew
                );

        Car::query()
            ->search($request_search)
            ->when(
                $request_manufacturer_id,
                fn (Builder $query) => $query
                    ->where(
                        'manufacturer_id',
                        $request_manufacturer_id
                    )
            )
            ->when(
                $request_price_from,
                fn (Builder $query) => $query
                    ->whereBetween(
                        'price_from',
                        [
                            $request_price_from,
                            $request_price_to,
                        ]
                    )
            )
            ->when(
                $request_car_sell_location,
                fn (Builder $query) => $query
                    ->where(
                        'car_sell_location',
                        $request_car_sell_location
                    )
            )
            ->when(
                $request_year_manufactured,
                fn (Builder $query) => $query
                    ->where(
                        'year_manufactured',
                        $request_year_manufactured
                    )
            )
            ->when(
                $request_fuel_type,
                fn (Builder $query) => $query
                    ->where(
                        'fuel_type',
                        $request_fuel_type
                    )
            )
            ->when(
                $request_car_label_origin,
                fn (Builder $query) => $query
                    ->where(
                        'car_label_origin',
                        $request_car_label_origin
                    )
            )
            ->when(
                $request_price_from,
                fn (Builder $query) => $query
                    ->whereBetween(
                        'miles_travelled_in_km_from',
                        [
                            $request_miles_travelled_in_km_from,
                            $request_miles_travelled_in_km_to,
                        ]
                    )
            )
            ->when(
                $request_user_has_legal_car_papers,
                fn (Builder $query) => $query
                    ->where(
                        'user_has_legal_car_papers',
                        true
                    )
            )
            ->when(
                $request_faragha_jahzeh,
                fn (Builder $query) => $query
                    ->where(
                        'faragha_jahzeh',
                        $request_faragha_jahzeh
                    )
            )
            ->when(
                $request_import_type,
                fn (Builder $query) => $query
                    ->where(
                        'car_import_type',
                        $request_import_type
                    )
            );

    }
}
