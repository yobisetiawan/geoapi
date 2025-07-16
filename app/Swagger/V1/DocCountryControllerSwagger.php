<?php

namespace App\Swagger\V1;

/**
 *
 * @OA\Get(
 *     path="/list-countries",
 *     tags={"Countries"},
 *     @OA\Response(
 *         response=200,
 *         description="return Country Data",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="Afghanistan"),
 *                     @OA\Property(property="iso3", type="string", example="AFG")
 *                 )
 *             )
 *         )
 *     ),
 * )
 */

class DocCountryControllerSwagger {}
