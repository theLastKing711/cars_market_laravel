<?php

use App\Models\TemporaryUploadedImages;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {

    TemporaryUploadedImages::query()
        ->whereDate(
            'created_at',
            '<',
            now()
                ->subtract('+1 day')
        )
        ->delete();

})->everyMinute();

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();
