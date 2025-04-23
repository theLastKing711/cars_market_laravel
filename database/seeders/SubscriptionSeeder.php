<?php

namespace Database\Seeders;

use App\Enum\Auth\SubscriptionType;
use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions

        foreach (SubscriptionType::cases() as $subscription_type) {
            Subscription::create(
                [
                    'type' => $subscription_type->value,
                    'maximum_number_of_cars_allowed_to_upload' => $subscription_type->maximum_number_of_cars_allowed_to_upload(),
                ]
            );
        }
    }
}
