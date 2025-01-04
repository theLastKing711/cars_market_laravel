<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /** @var array<array{ar: string, en: string, logo: string}>> $all_manufactureres */
        $all_manufactureres =
            config('constants.cars');

        foreach ($all_manufactureres as $key => $value) {

            Manufacturer::query()
                ->create([
                    'name_ar' => $value['ar'],
                    'name_en' => $value['en'],
                    'logo' => 'logo',
                ]);
        }
    }
}
