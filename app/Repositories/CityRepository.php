<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class CityRepository
{
    public function getCities($iso3, $province_name = null, $province_id = null)
    {
        $cache_name = 'list_cities_' . $iso3 . '_province_' . $province_name . '_id_' . $province_id;

        return Cache::remember($cache_name, env('CACHE_CITY_TTL', 3600), function () use ($iso3, $province_name, $province_id) {
            if (Storage::disk('local')->exists('provinces/list_' . $iso3 . '_provinces.json') === false) {
                return null;
            }
            $data = json_decode(Storage::disk('local')->get('provinces/list_' . $iso3 . '_provinces.json'), true);
            $cities_data =  [];
            foreach ($data as $key => &$v) {
                if (!empty($province_id)) {
                    if (isset($v['cities']) && $v['id'] == $province_id) {
                        $cities_data = array_merge($cities_data, $v['cities']);
                    }
                } else if (!empty($province_name)) {
                    if (isset($v['cities']) && $v['name'] == $province_name) {
                        $cities_data = array_merge($cities_data, $v['cities']);
                    }
                } else {
                    if (isset($v['cities'])) {
                        $cities_data = array_merge($cities_data, $v['cities']);
                    }
                }
            }
            return $cities_data;
        });
    }
}
