<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class CountryRepository
{
    public function getCountries()
    {
        return Cache::remember('countries_list', env('CACHE_COUNTRY_TTL', 3600), function () {
            if (Storage::disk('local')->exists('countries/list.json') === false) {
                return null;
            }
            return json_decode(Storage::disk('local')->get('countries/list.json'), true);
        });
    }
}
