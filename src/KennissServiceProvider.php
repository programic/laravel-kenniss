<?php

namespace Programic\Kenniss;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class KennissServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $config = config('services.kenniss');
        $apiKey = data_get($config, 'apiKey', '');
        $url = data_get($config, 'baseUrl', '');

        Http::macro('kenniss', fn () => Http::withToken($apiKey)->baseUrl($url));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Kenniss::class, fn () => new Kenniss());
        $this->app->alias(Kenniss::class, 'kenniss');
    }
}
