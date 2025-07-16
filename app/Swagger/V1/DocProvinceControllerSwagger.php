<?php

namespace App\Swagger\V1;

/**
 *
 * @OA\Get(
 *     path="/list-provinces",
 *     tags={"Provinces"},
 *     @OA\Parameter(
 *         name="iso3",
 *         in="query",
 *         required=true,
 *         description="ISO3 country code",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(response=200, description="return Constant Data", @OA\JsonContent())
 * )
 */

class DocProvinceControllerSwagger {}
