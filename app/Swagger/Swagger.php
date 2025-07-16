<?php

namespace App\Swagger;

/**

 *
 * @OA\OpenApi(
 *   @OA\Server(
 *      url="/api/v1",
 *      description="GEOAPI"
 *   ),
 *   @OA\Info(
 *      title="GEO API",
 *      version="1.0.0",
 *   ),
 * )

 *
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth",
 * )

 *
 * @OA\Parameter(
 *  in="path",
 *  parameter="OA_id",
 *  name="id",
 *  description="Key model",
 *  required=true,
 *      @OA\Schema(
 *          type="string"
 *      )
 *  )
 *
 */


class Swagger
{
}
