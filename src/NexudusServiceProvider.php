<?php

namespace Programic\Nexudus;

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
        $url = data_get($config, 'baseUrl', 'https://spaces.nexudus.com');

        Http::macro('kenniss', fn () => Http::withBasicAuth($apiKey)->baseUrl($url));
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
