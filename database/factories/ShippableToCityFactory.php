<?php

namespace Database\Factories;

use App\Enum\SyrianCity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippableToCity>
 */
class ShippableToCityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    // public function SyrianCity()
    // {

    //     return $this->state(function (array $attributes) {
    //         $syrian_city = fake()->randomElements(SyrianCity::cases(), fake()->randomNumber(0, 3))
    //     })
    // }
}
