<?php

namespace Programic\Kenniss;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class KennissServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     */
    public function boot(): void
    {
        $config = config('services.kenniss');
        $apiKey = data_get($config, 'apiKey', '');
        $url = data_get($config, 'baseUrl', '');

        Http::macro('kenniss', fn () => Http::withToken($apiKey)->baseUrl($url));
    }

    /**
     * Register the service provider.
     *
     */
    public function register(): void
    {
        $this->app->singleton(Kenniss::class, fn () => new Kenniss());
        $this->app->alias(Kenniss::class, 'kenniss');
    }
}
