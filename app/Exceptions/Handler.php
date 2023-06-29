<?php

namespace App\Exceptions;

use App\Http\Controllers\Api\ApiExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            \Log::debug($e);
        });

        $this->renderable(function(\Exception $exception, $request) {
            return $this->handleException($request, $exception);
        });
    }

    private function handleException($request, $exception)
    {
        if ($request->is('api/*') && $request->wantsJson()) {
            if (!App::environment('local')) {
                return (new ApiExceptionHandler($request, $exception))->call();
            }
        }
    }
}
