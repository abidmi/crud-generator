<?php

namespace Abidmi\CrudGenerator;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/crudgenerator.php' => config_path('crudgenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/crud-generator/'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Abidmi\CrudGenerator\Commands\CrudCommand',
            'Abidmi\CrudGenerator\Commands\CrudControllerCommand',
            'Abidmi\CrudGenerator\Commands\CrudModelCommand',
            'Abidmi\CrudGenerator\Commands\CrudMigrationCommand',
            'Abidmi\CrudGenerator\Commands\CrudViewCommand'
        );
    }

}
