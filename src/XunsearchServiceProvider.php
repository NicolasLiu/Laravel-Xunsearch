<?php
namespace Nicolasliu\Xunsearch;

use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;

class XunsearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/xunsearch.php' => config_path('xunsearch.php'),
        ], 'config');

        resolve(EngineManager::class)->extend('xunsearch', function () {
            return new XunsearchEngine();
        });
    }

}