<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Log::info('hello world');

        Log::info(config('app.env'));
        // $this->call([]);

        // if (config('app.env') === 'production') {

        // Log::info(config('app.env'));

        // $roles_count = DB::table('roles')->count();

        // $callable_seeders = [];

        // $roles_has_records = $roles_count > 0;

        // if (! $roles_has_records) {
        //     array_push($callable_seeders, RolesAndPermissionsSeeder::class);
        // }

        // $subscriptions_count = DB::table('subscriptions')->count();

        // $subscriptions_has_records = $subscriptions_count > 0;

        // if (! $subscriptions_has_records) {
        //     array_push($callable_seeders, SubscriptionSeeder::class);
        // }

        // if (! empty($callable_seeders)) {

        //     $this->call($callable_seeders);
        // }

        // return;
        // }
        // $this->call([
        //     RolesAndPermissionsSeeder::class,
        //     // ManufacturerSeeder::class,
        //     SubscriptionSeeder::class,
        //     // UserSeeder::class,
        // ]);
    }
}
