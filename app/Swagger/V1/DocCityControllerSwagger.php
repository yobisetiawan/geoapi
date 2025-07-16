<?php

namespace App\Swagger\V1;

/**
 *
 * @OA\Get(
 *     path="/list-cities",
 *     tags={"Cities"},
 *     @OA\Parameter(
 *         name="iso3",
 *         in="query",
 *         required=true,
 *         description="ISO3 country code",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="province_id",
 *         in="query",
 *         required=false,
 *         description="province_id",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="province_name",
 *         in="query",
 *         required=false,
 *         description="province name code",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(response=200, description="return Constant Data", @OA\JsonContent())
 * )
 */

class DocCityControllerSwagger {}
