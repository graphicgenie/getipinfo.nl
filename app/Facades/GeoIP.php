<?php

namespace App\Facades;

use GeoIp2\Model\City;
use GeoIp2\Model\Country;
use GeoIp2\Model\Insights;
use Illuminate\Support\Facades\Facade;

/**
 * @method static City city(string $ip)
 * @method static Country country(string $ip)
 * @method static Insights insights(string $ip)
 */

class GeoIP extends Facade
{
    /**
     * Get the registered name of
     * the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return GeoIP::class;
    }
}
