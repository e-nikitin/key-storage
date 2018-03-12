<?php

namespace nikitin\KeyStorage;

use Illuminate\Support\ServiceProvider;
use nikitin\KeyStorage\Commands\CreateTable;

class KeyStorageServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            CreateTable::class
        ]);

        $configPath = __DIR__.'/../config/key-storage.php';
        $this->publishes([
            $configPath => config_path('key-storage.php')
        ], 'key-storage');

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__.'/../config/key-storage.php';
        $this->mergeConfigFrom($configPath, 'key-storage');

        $this->app->singleton(KeyStorage::class, KeyStorage::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [KeyStorage::class];
    }

}
