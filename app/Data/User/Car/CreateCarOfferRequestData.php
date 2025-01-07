<?php

namespace App\Data\User\Car;

use App\Enum\Color;
use App\Enum\Currency;
use App\Enum\FuelType;
use App\Enum\ImportType;
use App\Enum\TransmissionType;
use App\Rules\ValidYear;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class CreateCarOfferRequestData extends Data
{
    public function __construct(
        #[OAT\Property]
        public int $manufacturer_id,
        #[OAT\Property]
        public int $user_id,
        #[OAT\Property]
        public int $is_new_car,
        #[OAT\Property]
        public ?int $year_manufactured,
        #[OAT\Property]
        public ?Color $car_color,
        #[OAT\Property]
        public ?int $model,
        #[OAT\Property]
        public ?string $description,
        #[OAT\Property]
        public int $car_price,
        #[OAT\Property]
        public Currency $car_sell_currency,
        #[OAT\Property]
        public ?FuelType $fuel_type,
        #[OAT\Property]
        public ?int $car_sell_location,
        #[OAT\Property]
        public ?bool $is_car_shippable_to_a_different_city,
        #[OAT\Property]
        public ?ImportType $car_import_type,
        #[OAT\Property]
        public int $car_label_origin,
        #[OAT\Property]
        public TransmissionType $transmission,
        #[OAT\Property]
        public ?int $miles_travelled_in_km,
        #[OAT\Property]
        public ?bool $has_tuf_check_passed,
        #[OAT\Property]
        public ?bool $user_has_legal_car_papers,
        #[OAT\Property]
        public ?bool $faragha_jahzeh,
        #[OAT\Property]
        public ?bool $is_tajrobeh,
    ) {}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        return [
            'year_manufactured' => ['int', 'nullable', new ValidYear],
            'miles_travelled_in_km' => ['int', 'nullable'],
        ];
    }
}
