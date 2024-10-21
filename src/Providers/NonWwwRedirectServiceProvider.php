<?php

namespace Mohamedhk2\LaravelProdTools\Providers;

use Illuminate\Support\ServiceProvider;

class NonWwwRedirectServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->getConfigPath() => config_path('no-www.php'),
        ], 'hk2-www');
    }

    /**
     * @return string
     */
    private function getConfigPath()
    {
        return dirname(__DIR__, 2) . '/config/no-www.php';
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getConfigPath(), 'no-www');
    }
}
