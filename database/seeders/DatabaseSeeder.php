<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (env('APP_ENV') === 'production') {

            $roles_count = DB::table('roles')->count();

            $roles_has_records = $roles_count > 0;

            $callable_seeders = [];

            if (! $roles_has_records) {
                array_push($callable_seeders, RolesAndPermissionsSeeder::class);
            }

            $subscriptions_count = DB::table('subscriptions')->count();

            $subscriptions_has_records = $subscriptions_count > 0;

            if (! $subscriptions_has_records) {
                array_push($callable_seeders, SubscriptionSeeder::class);
            }

            if (! $roles_has_records) {

                $this->call($callable_seeders);
            }

            return;
        }

        $this->call([
            RolesAndPermissionsSeeder::class,
            // ManufacturerSeeder::class,
            SubscriptionSeeder::class,
            // UserSeeder::class,
        ]);
    }
}
