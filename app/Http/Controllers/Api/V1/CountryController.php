<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\CountryRepository;

class CountryController extends Controller
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index()
    {
        $countries = $this->countryRepository->getCountries();

        if ($countries === null) {
            return response()->json([
                'status' => 'error',
                'message' => 'Countries data not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $countries,
        ]);
    }
}
