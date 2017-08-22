<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        view()->composer('*', function ($view) {
            $routerUri = \Request::route()->uri;
            $uri = explode('/', $routerUri);
            if(!isset($uri[1]))
            {
                $uri[1] = $uri[0];
            }
            $view->with('current_route_name', $uri[1]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
