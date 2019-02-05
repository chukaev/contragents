<?php

namespace App\Providers;

use App\Services\Admin\AdminPanelIndexesService;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Register service in global container.
         */
        $this->app->singleton('Services\Queries\Base\QueriesService', function ($app, array $parameters) {
            $modelNamespace = "App\Models\\";
            $serviceNamespace = "App\Services\Queries\\";
            $serviceClassName = $serviceNamespace . $parameters['service'];
            $modelClassName = ($modelNamespace . $parameters['model']);

            return new $serviceClassName($modelClassName);
        });

        /**
         * Register service to query total counts for section in admin panel as singleton.
         */
        $this->app->singleton('Services\Admin\AdminPanelIndexesService', function ($app) {
            return new AdminPanelIndexesService();
        });

    }
}
