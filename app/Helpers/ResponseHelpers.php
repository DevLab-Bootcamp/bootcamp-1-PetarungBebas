<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

if (!function_exists('successResponse')) {
    /**
     * Generate a success response with detailed data
     *
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    function successResponse(string $message,array $data, int $code = 200): JsonResponse {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}

if (!function_exists('errorResponse')) {
    /**
     * Generate an error response
     *
     * @param string $message
     * @param array $errors
     * @param int $code
     * @return JsonResponse
     */
    function errorResponse(string $message, array $errors = [], int $code ): JsonResponse {
        $errorCount = count($errors);

        if ($errorCount > 1) {
            $message .= ' (and ' . ($errorCount - 1) . ' more error' . ($errorCount > 2 ? 's' : '') . ')';
        }

        return response()->json([
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }
}


// $errorCount = count($errors);
// if ($errorCount > 1) {
//     $message .= ' (and ' . ($errorCount - 1) . ' more error' . ($errorCount > 2 ? 's' : '') . ')';
// }