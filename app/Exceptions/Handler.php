<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * Report or log an exception.
     *
     * @param Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception $exception
     * @return Response
     */
    public function render($request, Exception $exception)
    {
        // This will replace our 404 response with
        // a JSON response.
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }

        if ($exception instanceof ValidationException) {
            return response()->json([
                'error' => 'Resource not valid',
                'message' => $exception->validator->errors()
            ], $exception->status);
        }

        if ($exception instanceof QueryException) {
            return response()->json([
                'error' => 'Query Exception',
                'message' => $exception->errorInfo[2]
            ], 500);
        }

        /*if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'error' => 'Query Exception',
                'message' => $exception
            ], 405);
        }*/

       /* return response()->json([
            'error' => 'Resource not found',
            'message' => $exception
        ], 405);*/


        return parent::render($request, $exception);
    }
}
