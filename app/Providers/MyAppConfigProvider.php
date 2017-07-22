<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyAppConfigProvider extends ServiceProvider {

    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //register menu config
        $this->app->singleton('MenuConfig', function($app) {
            return new \App\Libs\Config\MenuConfig();
        });

        //register menu config
        $this->app->singleton('PermitConfig', function($app) {
            return new \App\Libs\Config\PermitConfig();
        });

        //register widget config
        $this->app->singleton('WidgetConfig', function($app) {
            return new \App\Libs\Config\WidgetConfig();
        });

        //register theme config
        $this->app->singleton('ThemeConfig', function($app) {
            return new \App\Libs\Config\ThemeConfig();
        });

        $this->app->singleton('DirectionConfig', function($app) {
            return new \App\Libs\Config\DirectionConfig();
        });
    }

    public function provides() {
        return [
            'MenuConfig',
            'PermitConfig',
            'WidgetConfig',
            'ThemeConfig',
            'DirectionConfig'
        ];
    }

}