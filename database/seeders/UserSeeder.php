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
            ->hasRandomSubscriptionType()
            ->has(
                Car::factory()
                    ->santaFeFirst()
                    ->pick_random_shippable_syrian_cities()
                    ->count(1)
            )
            ->create();

        User::factory()
            ->hasRandomSubscriptionType()
            ->has(
                Car::factory()
                    ->santaFeSecond()
                    ->pick_random_shippable_syrian_cities()
                    ->count(1)
            )
            ->create();

        User::factory()
            ->hasRandomSubscriptionType()
            ->has(
                Car::factory()
                    ->santaFeThrid()
                    ->pick_random_shippable_syrian_cities()
                    ->count(1)
            )
            ->create();

        User::factory()
            ->hasRandomSubscriptionType()
            ->has(
                Car::factory()
                    ->state([
                        'model' => 'ألانترا',
                    ])
                    ->pick_random_shippable_syrian_cities()
                    ->count(1)
            )
            ->has(
                Car::factory()
                    ->state([
                        'manufacturer_id' => 1,
                        'manufacturer_name_ar' => 'تويوتا',
                        'manufacturer_name_en' => 'toyota',
                        'model' => 'كورولا',
                    ])
                    ->pick_random_shippable_syrian_cities()
                    ->count(1)
            )
            ->hasFavouriteCars()
            ->create();

        User::factory()
            ->hasRandomSubscriptionType()
            ->has(
                Car::factory()
                    ->state([
                        'model' => 'كيا ريو',
                    ])
                    ->count(1)
            )
            ->has(
                Car::factory()
                    ->state([
                        'manufacturer_id' => 1,
                        'manufacturer_name_ar' => 'تويوتا',
                        'manufacturer_name_en' => 'toyota',
                        'model' => 'كورولا',
                    ])
                    ->count(1)
            )
            ->create();

        // User::factory()
        //     ->has(
        //         Car::factory()
        //             ->state([
        //                 'model' => 'النترا',
        //             ])
        //             ->count(1)
        //     )
        //     ->create();

        // User::factory()
        //     ->staticUser()
        //     ->has(
        //         Car::factory()
        //             ->count(15)
        //     )
        //     ->create();

        // User::factory()
        //     ->syrianNumber()
        //     ->count(5)
        //     ->has(
        //         Car::factory()
        //             ->count(5)
        //     )
        //     ->create();
    }
}
