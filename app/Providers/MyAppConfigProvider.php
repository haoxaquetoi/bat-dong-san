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

        //register direction
        $this->app->singleton('DirectionConfig', function($app) {
            return new \App\Libs\Config\DirectionConfig();
        });
        //register direction
        $this->app->singleton('ParamsSearchConfig', function($app) {
            return new \App\Libs\Config\ParamsSearchConfig();
        });

        //register direction
        $this->app->singleton('SettingConfig', function($app) {
            return new \App\Libs\Config\SettingConfig();
        });

        //register direction
        $this->app->singleton('BuildUrl', function($app) {
            return new \App\Libs\BuildUrl();
        });
    }

    public function provides() {
        return [
            'MenuConfig',
            'PermitConfig',
            'WidgetConfig',
            'ThemeConfig',
            'DirectionConfig',
            'SettingConfig',
            'BuildUrl'
        ];
    }

}
