<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
      $this->renderable(function(NotFoundHttpException $exception, $request) {

        if($request->expectsJson()) {
          return response()->json([
            'message' => 'yanlış yere geldin aq'
          ], 404);
          // return Route::respondWithRoute('api.fallback');
        }
        if ($request->expectsJson() && $exception instanceof AuthorizationException){
          return response()->json(['message' => $exception->getMessage()], 403);
        }

      });
    }
}
