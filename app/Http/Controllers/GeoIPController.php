<?php

namespace App\Http\Controllers;

use App\Facades\GeoIP;
use Illuminate\Support\Facades\Request;

class GeoIPController extends Controller
{
    public function __invoke(string $ip = '') {
        if(empty($ip))
            $ip = Request::ip();

        $ipInfo = GeoIP::city($ip);

        return [
            'ip' => $ip,
            'hostname' => gethostbyaddr($ip),
            'city' => $ipInfo->city->name,
            'country' => $ipInfo->country->name,
            'country_iso' => $ipInfo->country->isoCode,
            'continent' => $ipInfo->continent->name,
            'continent_code' => $ipInfo->continent->code,
            'latitude' => $ipInfo->location->latitude,
            'longitude' => $ipInfo->location->longitude,
            'time_zone' => $ipInfo->location->timeZone,
            'postal' => $ipInfo->postal->code,
            'province' => $ipInfo->mostSpecificSubdivision->name,
            'province_iso' => $ipInfo->mostSpecificSubdivision->isoCode,
            'asn' => [
                'number' => $ipInfo->traits->autonomousSystemNumber,
                'organization' => $ipInfo->traits->autonomousSystemOrganization,
                'domain' => $ipInfo->traits->domain,
                'isp' => $ipInfo->traits->isp,
                'network' => $ipInfo->traits->network,
            ]
        ];
    }
}
