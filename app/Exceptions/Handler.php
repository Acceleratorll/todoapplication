<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    
    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException && $request->wantsJson()) {
            return response()->json([
                'message'   => 'Not found!'
            ], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $e);
    }

    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
