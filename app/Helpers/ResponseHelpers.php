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
    function successResponse(string $message, array $data,string $token = '', int $code = 200): JsonResponse
    {
        $response = [
            'message' => $message,
            'data' => $data,
        ];
        if (!empty($token)) {
            $response['token'] = $token;
        }

        return response()->json($response, $code);
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
    function errorResponse(string $message, array $errors = [], int $code): JsonResponse
    {
        $response = [
            'message' => $message,
        ];

        // Tambahkan errors jika tidak kosong
        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }
}


// $errorCount = count($errors);
// if ($errorCount > 1) {
//     $message .= ' (and ' . ($errorCount - 1) . ' more error' . ($errorCount > 2 ? 's' : '') . ')';
// }