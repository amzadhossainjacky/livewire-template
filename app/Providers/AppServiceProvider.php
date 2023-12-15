<?php

namespace App\Providers;
use Illuminate\Support\Facades\Vite;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ## Vite helper function configuration
        Vite::macro('image', fn (string $asset) => Vite::asset("resources/images/{$asset}"));
        Vite::macro('frontend_image', fn (string $asset) => Vite::asset("resources/frontend_images/{$asset}"));
    }
}
