<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use NotificationChannels\Fcm\FcmChannel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        // makes $guarded=[] in Model unneccessary
        Model::unguard();
        // Model::shouldBeStrict(); https://www.linkedin.com/posts/obada-alzidi_laravel-php-webdevelopment-activity-7302608294991269888-D46l?utm_source=share&utm_medium=member_desktop&rcm=ACoAADfdxjIBEfsVNDLYZGUCg68ARXDur4t-vms
        // if ($this->app->environment('local')) {
        //     $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        // }

        $this->app->register(BuilderMacrosServiceProvider::class);

        // $this->app->register(FcmChannel::class);

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
