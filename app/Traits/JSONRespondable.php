<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait JSONRespondable{


    /**
     * Return a success response
     *
     * @param int $code
     * @param string|array $message
     * @param array $data
     * @param array $headers
     * @return JsonResponse
     */
    public function successResponse(int $code , string|array $message = '' ,
                                    array $data = [] , array $headers = []) : JsonResponse
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data
        ] , $code , $headers);
    }


    /**
     * Return a redirect response
     *
     * @param int $code
     * @param string $message
     * @param string $url
     * @param array $headers
     * @return JsonResponse
     */
    public function redirectResponse(int $code, string $message , string $uri ,
                                     array $headers = []): JsonResponse
    {
        return response()->json([
            'status' => 'Redirect',
            'message' => $message,
            'URI' => $uri
        ] , $code , $headers);
    }
}
