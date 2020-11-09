<?php


namespace App\Http\Traits;


use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    public function file($content, string $file_name)
    {
        return response($content, 200, [
            'Content-Type' => 'application/x-mpegURL',
            'Content-Disposition' => "attachment; filename=\"$file_name\"",
        ]);
    }

    public function success($result, string $message): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function error($error, $error_messages = [], $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if (!empty($error_messages)) {
            $response['data'] = $error_messages;
        }

        return response()->json($response, $code);
    }
}