<?php

use App\Models\TemporaryUploadedImages;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {

    tap(
        TemporaryUploadedImages::query()
            ->whereDate(
                'created_at',
                '<',
                now()
                    ->subtract('+1 day'),
            ),
        function ($query) {

            /** @var Collection<TemporaryUploadedImages> $temporary_images_to_remove */
            $temporary_images_to_remove =
                $query
                    ->get();

            $temporary_images_to_remove
                ->each(
                    fn ($item) => Cloudinary::destroy($item->public_id)
                );

            $query->delete();

        }
    );

})->everyMinute();

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();
