<?php

namespace App\Http\Controllers\Api\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    public function apiResponse(array $data, $statusCode = 200): JsonResponse
    {
        return response()->json($data, $statusCode);
    }
}
