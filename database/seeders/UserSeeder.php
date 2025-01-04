<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->staticAdmin()
            ->create();

        User::factory()
            ->staticUser()
            ->has(
                Car::factory()
                    ->count(15)
            )
            ->create();

        User::factory()
            ->syrianNumber()
            ->count(5)
            ->has(
                Car::factory()
                    ->count(5)
            )
            ->create();
    }
}
