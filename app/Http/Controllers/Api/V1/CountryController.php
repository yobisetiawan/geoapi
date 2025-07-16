<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Cache::remember('countries_list', 3600, function () {
            return json_decode(Storage::disk('local')->get('countries/list.json'), true);
        });

        return response()->json([
            'status' => 'success',
            'data' => $countries,
        ]);
    }
}
