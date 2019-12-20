<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        if ($exception instanceof QueryException and 23000 == $exception->getCode()) {
            return;
        } else {
            parent::report($exception);
        }
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof QueryException && !config('app.debug')) {
            return $this->renderQueryException($exception);
        } else {
            return parent::render($request, $exception);
        }
    }

    protected function renderQueryException($exception)
    {
        switch ($exception->getCode()) {
            case 23000:
                return redirect()->back()->with('status:error', 'Cannot delete or update a parent row.');
            default:
                return redirect()->back()->with('status:error', 'Database error.');
        }
    }
}
