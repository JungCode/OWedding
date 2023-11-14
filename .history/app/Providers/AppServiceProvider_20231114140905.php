<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
    /**
 * Bootstrap any application services.
 *
 * @return void
 */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
    public function boot(): void
    {
        
    }
}
