<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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

        });

        $this->renderable(function(\Exception $e, $request) {


            switch (true) {
                case $e instanceof NotFoundHttpException:
                    return response()->json([
                        'message' => 'Http not found.'
                    ], 404);
                case $e instanceof MethodNotAllowedHttpException:
                    return response()->json([
                        'message' => 'Method not allowed.'
                    ], 405);
                case $e instanceof UnauthorizedHttpException:
                    return response()->json([
                        'message' => 'Unauthorized.'
                    ], 401);


            }

            return null;
        });
    }
}
