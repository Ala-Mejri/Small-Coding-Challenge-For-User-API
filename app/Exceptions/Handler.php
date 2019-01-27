<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Debug\Exception\FatalErrorException;

class Handler extends ExceptionHandler {

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception) {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception) {

        // This will replace our 404 response with
        // a JSON response.
        if ($exception instanceof NotFoundHttpException) {
            return response()->json(["response" => 404, 'data' => [], "message" => "Page Not Found"], 404);
        }elseif ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(["response" => 405, 'data' => [], "message" => "Method Not Allowed"], 405);
        } elseif ($exception instanceof FatalErrorException) {
            return response()->json(["response" => 500, 'data' => [], "message" => "Internal Server Error"], 500);
        }
        return parent::render($request, $exception);
    }

}
