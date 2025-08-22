<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Locale;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        $locales = Schema::hasTable('locales') ? Locale::all() : collect();
        $settings = Schema::hasTable('settings') ? Setting::pluck('value', 'key') : collect();

        view()->share('locales', $locales);
        view()->share('settings', $settings);

        $this->app->singleton('themeSettings', function () {
            return collect(config('theme'));
        });

        foreach (config('routes')['resources'] as $routeKey => $details){
            foreach ($details['routeName'] as $locale => $slug){
                Route::model($slug,$details['model']);
            }
        }
    }
}
