<?php

namespace Database\Factories;

use App\Enum\Auth\RolesEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_code' => fake()->numberBetween('900', '963'),
            'phone_number' => fake()->phoneNumber(),
            'remember_token' => Str::random(10),
        ];
    }

    public function staticAdmin(): Factory
    {
        return $this->state([
            'country_code' => '963',
            'phone_number' => '968259851',
            'remember_token' => Str::random(10),
        ])->afterCreating(function (User $user) {
            $user->assignRole(RolesEnum::ADMIN);
        });
    }

    public function staticUser(): Factory
    {
        return $this->state([
            'country_code' => '963',
            'phone_number' => '968259852',
            'remember_token' => Str::random(10),
        ])->afterCreating(function (User $user) {
            $user->assignRole(RolesEnum::USER);
        });
    }

    public function syrianNumber()
    {
        return $this->state(new Sequence(
            function (Sequence $sequence) {
                $randomPhoneNumber =
                    '968'.fake()->numberBetween(111111, 999999);

                return [
                    'country_code' => '963',
                    'phone_number' => $randomPhoneNumber,
                ];
            }
        ));
    }
}
