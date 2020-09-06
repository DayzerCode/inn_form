<?php

namespace App\Providers;

use App\Contracts\Services\Api\TaxpayerApi;
use App\Contracts\Services\TaxpayerServiceContract;
use App\Services\Api\StatusNpdApi;
use App\Services\TaxpayerService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class TaxpayerProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $httpClient = new Client([
            'headers' => ['Content-Type' => 'application/json'],
            'base_uri' => 'https://statusnpd.nalog.ru/api/v1/',
        ]);
        $this->app->bind(TaxpayerApi::class, function () use ($httpClient) {
            return new StatusNpdApi($httpClient, $this->app['log']);
        });
        $this->app->bind(TaxpayerServiceContract::class, function () use ($httpClient) {
            return new TaxpayerService(new StatusNpdApi($httpClient, $this->app['log']), $this->app['cache'], $this->app['log']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
