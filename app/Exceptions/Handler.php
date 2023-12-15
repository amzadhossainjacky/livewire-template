<?php

namespace App\Exceptions;

use Throwable;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->renderable(function (Throwable $e) {
            $route_segments = _route_segments();
            $request_segment = request()->segment(1);

            if (in_array($request_segment, $route_segments)) {
                if ($e instanceof UnauthorizedException) {
                    return redirect()->route($request_segment . '.four_zero_three');
                } elseif ($e instanceof NotFoundHttpException) {
                    return redirect()->route($request_segment . '.four_zero_four');
                } else {
                    return;
                }
            }
        });
    }
}
