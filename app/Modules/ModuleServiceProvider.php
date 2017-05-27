<?php

namespace App\Modules;

use Illuminate\Support\ServiceProvider;
use Request;

class ModuleServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Load cai array modules trong file module.php trong thu muc config
        $modules = config('module');

        $mod = $modules['frontend'];
        //Detect xem co phai la Backend route hay khong
        if (Request::is('backend') || Request::is('backend/*'))
        {
            $mod = $modules['backend'];
        }
        //Load routes 
        $allFileRoutes = array_slice(scandir(__DIR__ . "/$mod/routes/"), 2);
        foreach ($allFileRoutes as $routes)
        {
            $this->loadRoutesFrom(__DIR__ . "/$mod/routes/$routes");
        }


        //load view
        if (file_exists(__DIR__ . "/$mod/routes/routes.php"))
        {
            $this->loadRoutesFrom(__DIR__ . "/$mod/routes/routes.php");
        }
        //load view
        if (is_dir(__DIR__ . "/$mod/Views"))
        {
            $this->loadViewsFrom(__DIR__ . "/$mod/Views", $mod);
        }
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
