<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
          |--------------------------------------------------------------------------
          | IF MYSQL VERSION IS OLD
          |--------------------------------------------------------------------------
         */
        Schema::defaultStringLength(191);

        /**
          |--------------------------------------------------------------------------
          | Extend blade so we can define a variable
          | @define $variable = "whatever"
          |--------------------------------------------------------------------------
         */
        Blade::extend(function($value) {
            return preg_replace('/\@define(.+)/', '<?php ${1}; ?>', $value);
        });
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
