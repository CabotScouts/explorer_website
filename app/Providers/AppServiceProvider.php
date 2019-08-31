<?php

namespace App\Providers;

use TCG\Voyager\Facades\Voyager;
use App\FormFields\LocationFormField;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::addFormField(LocationFormField::class);
    }
}
