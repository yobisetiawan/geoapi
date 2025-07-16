<?php

namespace App\Swagger\V1;

/**
 *
 * @OA\Get(
 *     path="/list-cities",
 *     tags={"GEOAPI"},
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
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id", type="integer", example=48374),
 *                     @OA\Property(property="name", type="string", example="Banda Aceh")
 *                 )
 *             )
 *         )
 *     )
 * )
 */

class DocCityControllerSwagger {}
