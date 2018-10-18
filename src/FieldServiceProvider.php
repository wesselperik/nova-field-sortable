<?php

namespace Dewsign\NovaFieldSortable;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-field-sortable', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-field-sortable', __DIR__.'/../dist/css/field.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRoutes();
    }

    /**
     * Registers field routes
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::domain(config('nova.domain', null))
            ->middleware(config('nova.middleware', []))
            ->prefix('/nova-vendor/dewsign/nova-field-sortable')
            ->group(__DIR__ . '/routes.php');
    }
}
