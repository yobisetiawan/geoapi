<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index(Request $req)
    {
        $iso3 = $req->input('iso3');
        if (empty($iso3)) {
            return response()->json([
                'status' => 'error',
                'message' => 'ISO3 code is required',
            ], 400);
        }

        $province_name = $req->input('province_name');
        $province_id = $req->input('province_id');

        $cities = $this->cityRepository->getCities($iso3, $province_name, $province_id);

        if ($cities === null) {
            return response()->json([
                'status' => 'error',
                'message' => 'Provinces data not found for the given ISO3 code',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $cities,
        ]);
    }
}
