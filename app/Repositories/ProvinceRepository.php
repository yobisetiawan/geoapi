<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class ProvinceRepository
{
    public function getProvinces($iso3)
    {
        if (Storage::disk('local')->exists('provinces/list_' . $iso3 . '_provinces.json') === false) {
            return null;
        }
        return Cache::remember('list_' . $iso3 . '_provinces', env('CACHE_PROVINCE_TTL', 3600), function () use ($iso3) {
            $data = json_decode(Storage::disk('local')->get('provinces/list_' . $iso3 . '_provinces.json'), true);
            foreach ($data as $key => &$v) {
                if (isset($v['cities'])) {
                    unset($v['cities']);
                }
            }
            return $data;
        });
    }
}
