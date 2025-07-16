<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class ProvinceController extends Controller
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


        $provinces = Cache::remember('list_' . $iso3 . '_provinces', 3600, function () use ($iso3) {
            $data = json_decode(Storage::disk('local')->get('provinces/list_' . $iso3 . '_provinces.json'), true);
            foreach ($data as $key => &$v) {
                if (isset($v['cities'])) {
                    unset($v['cities']);
                }
            }

            return $data;
        });

        return response()->json([
            'status' => 'success',
            'data' => $provinces,
        ]);
    }
}
