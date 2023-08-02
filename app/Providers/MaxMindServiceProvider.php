<?php

namespace App\Providers;

use App\Facades\GeoIP;
use GeoIp2\WebService\Client;
use Illuminate\Support\ServiceProvider;

class MaxMindServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(GeoIP::class, function () {
            return new Client(
                config('maxmind.account_id'),
                config('maxmind.license_key'),
                [config('maxmind.lang')],
                ['host' => config('maxmind.host')]
            );
        });
    }

}
