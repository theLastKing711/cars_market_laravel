<?php

namespace Database\Factories;

use App\Enum\Currency;
use App\Enum\FuelType;
use App\Enum\ImportType;
use App\Enum\SyrianCity;
use App\Enum\TransmissionType;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

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

        return [
            'name_ar' => fake()->text(),
            'name_en' => fake()->text(),
            'is_new_car' => fake()->boolean(),
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
            'is_faragha_jahzeh' => fake()->boolean(),
            'is_kassah' => fake()->boolean(),
            'is_khalyeh' => fake()->boolean(),
            'is_tajrobeh' => fake()->boolean(),
        ];
    }

    public function santaFeFirst()
    {
        return $this->
            state([
                'name_ar' => 'سانتافيه',
            ]);
    }

    public function santaFeSecond()
    {
        return $this->
            state([
                'name_ar' => 'سنتافيه',
            ]);
    }

    public function santaFeThrid()
    {
        return $this->state([
            'name_ar' => 'سانتفيه',
        ]);
    }

    public function pick_random_shippable_syrian_cities(): static
    {
        $syrian_cities =
            SyrianCity::cases();

        return $this->afterCreating(function (Car $car) use ($syrian_cities) {

            $random_number =
                fake()->numberBetween(0, 3);

            Log::info('random_number {random_number}', ['random_number' => $random_number]);

            $random_number_of_syrian_cites =
                fake()
                    ->randomElements(
                        $syrian_cities,
                        2
                    );

            foreach ($random_number_of_syrian_cites as $key => $city) {
                $car->shippable_to()
                    ->create([
                        'city' => $city,
                    ]);
            }

        });
    }

    // public function shipsToRandomCity() {

    //     $all_syrian_cities =
    //         SyrianCity::cases()

    //     // return $this->afterCreating(function (Car $car) {

    //     // });
    // }

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
