<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('FontEnd.Include.sidebar',function ($view){
            $languages = DB::select("select * from movie_countries");
            $view->with('languages',$languages);

        });

        View::composer('user.Include.sidebar',function ($view){
            $languages = DB::select("select * from movie_countries");
            $view->with('languages',$languages);

        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Hesto\MultiAuth\MultiAuthServiceProvider');
        }
    }
}
