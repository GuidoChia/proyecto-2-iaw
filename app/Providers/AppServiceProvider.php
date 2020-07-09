<?php

namespace App\Providers;

use App\Observers\ReactiveObserver;
use App\Reactive;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Reactive::observe(ReactiveObserver::class);
    }
}
