<?php

namespace Database\Factories;

use App\Enum\Currency;
use App\Enum\FuelType;
use App\Enum\ImportType;
use App\Enum\SyrianCity;
use App\Enum\TransmissionType;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $manufacturer_id =
            Manufacturer::query()
                ->inRandomOrder()
                ->first()
                ->id;

        return [
            'manufacturer_id' => $manufacturer_id,
            'is_new_car' => fake()->boolean(),
            'model' => fake()->text('10'),
            'year_manufactured' => fake()->year(),
            'car_color' => fake()->numberBetween(0, 10),
            'description' => fake()->text(),
            'car_price' => fake()->numberBetween(1000, 100000),
            'car_sell_currency' => fake()->randomElement(Currency::cases()),
            'fuel_type' => fake()->randomElement(FuelType::cases()),
            'car_sell_location' => fake()->randomElement(SyrianCity::cases()),
            'is_car_shippable_to_a_different_city' => fake()->boolean(),
            'car_import_type' => fake()->randomElement(ImportType::class),
            'car_label_origin' => fake()->randomElement(SyrianCity::cases()),
            'transmission' => fake()->randomElement(TransmissionType::cases()),
            'miles_travelled_in_km' => fake()->numberBetween(0, 100000),
            'has_tuf_check_passed' => fake()->boolean(),
            'user_has_legal_car_papers' => fake()->boolean(),
            'faragha_jahzeh' => fake()->boolean(),
            'is_tajrobeh' => fake()->boolean(),
        ];
    }

    // public function labelFromAleppo()
    // {
    //     return
    //         $this->state([
    //             'car_lablel_origin' => SyrianCity::Aleppo,
    //         ]);
    // }

    // public function labelFromIdleb()
    // {
    //     return
    //         $this->state([
    //             'car_lablel_origin' => SyrianCity::Idleb,
    //         ]);
    // }
}
