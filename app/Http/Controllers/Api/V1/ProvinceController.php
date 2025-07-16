<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\ProvinceRepository;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    protected $provinceRepository;

    public function __construct(ProvinceRepository $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
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

        $provinces = $this->provinceRepository->getProvinces($iso3);

        if ($provinces === null) {
            return response()->json([
                'status' => 'error',
                'message' => 'Provinces data not found for the given ISO3 code',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $provinces,
        ]);
    }
}
