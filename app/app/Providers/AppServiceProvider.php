<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use TCG\Voyager\Facades\Voyager;
use App\FormFields\LocationFormField;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Paginator::useBootstrap();
      Voyager::addFormField(LocationFormField::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      //
    }
}
