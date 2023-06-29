<?php
namespace App\Traits\Api;


trait MyResponse {
    protected function apiResponse($data = null, bool $status = true, ?string $message = '', ?int $code =  200)
    {
        if ($status === true) {
            if(get_class($data) === "App\Http\Resources\Api\ResponsePagination") {
                $response = [
                    'code' => $code,
                    'success'=> $status,
                    'message' => $message,
                    'data' => $data->resolve()[0],
                    'paginate' => $data->resolve()[1],
                ];

                return response()->json($response, $code);
            }
        }

        $response = [
            'code' => $code,
            'success'=> $status,
            'message' => $message,
            'data' => $data,
        ];


        return response()->json($response, $code);
    }
}
