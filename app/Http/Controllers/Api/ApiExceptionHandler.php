<?php

namespace App\Http\Controllers\Api;

use App\Traits\Api\MyResponse;
use ErrorException;
use Illuminate\Http\Request;

class ApiExceptionHandler
{
    use MyResponse;
    private static $exception;
    private static $request;

    public function __construct(Request $request, \Exception $exception)
    {
        self::$exception = $exception;
        self::$request = $request;
    }

    public function call()
    {
        $data = null;
        $message = self::$exception->getMessage();
        switch (get_class(self::$exception)) {
            case 'Error':
            case 'Illuminate\Database\QueryException':
            case 'ErrorException':
                $code = 500;
                $message = "Something went Wrong!, Please contact our developer if error still occurs!.";
                break;
            case 'Symfony\Component\HttpKernel\Exception\NotFoundHttpException':
                $code = 404;
                if (empty($message)) {
                    $message = "please make sure you do the request correctly!";
                }
                break;
            case 'Illuminate\Validation\ValidationException':
                $data = self::$exception->errors();
                $code = 422;
                break;
            default:
                $code = 400;
        }

        return $this->responseHandler($message, $code, $data);
    }

    private function responseHandler(string $message = '', int $code = 400, $data = null)
    {

        return $this->apiResponse($data, false, $message, $code);
    }
}
