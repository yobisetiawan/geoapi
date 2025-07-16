<?php

namespace App\Swagger\V1;

/**
 *
 * @OA\Get(
 *     path="/list-provinces",
 *     tags={"GEOAPI"},
 *     @OA\Parameter(
 *         name="iso3",
 *         in="query",
 *         required=true,
 *         description="ISO3 country code",
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
 *                     @OA\Property(property="id", type="integer", example=1615),
 *                     @OA\Property(property="name", type="string", example="Aceh")
 *                 )
 *             )
 *         )
 *     )
 * )
 */

class DocProvinceControllerSwagger {}
