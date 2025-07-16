<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $req)
    {
        $iso3 = $req->input('iso3');
        if (empty($iso3)) {
            return response()->json([
                'status' => 'error',
                'message' => 'ISO3 code is required',
            ], 400);
        }

        if (Storage::disk('local')->exists('provinces/list_' . $iso3 . '_provinces.json') === false) {
            return response()->json([
                'status' => 'error',
                'message' => 'Provinces data not found for the given ISO3 code',
            ], 404);
        }


        $province_name = $req->input('province_name');
        $province_id = $req->input('province_id');

        $cache_name = 'list_cities_' . $iso3 . '_province_' . $province_name . '_id_' . $province_id;

        $cities = Cache::remember($cache_name, 3600, function () use ($iso3, $province_name, $province_id) {
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

        return response()->json([
            'status' => 'success',
            'data' => $cities,
        ]);
    }
}
