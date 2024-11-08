<?php

namespace App\Http\Controllers\Api\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    public function apiResponse(array|JsonResponse $data, $statusCode = 200): JsonResponse
    {
        if ($statusCode == 0) $statusCode = 500;
        if ($data instanceof JsonResponse) return $data;

        return response()->json($data, $statusCode);
    }
}
