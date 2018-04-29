<?php

namespace App\Exceptions;

use Exception;
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
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
        if( $request->wantsJson() or $request->ajax() ) 
            return $this->renderExceptionAsJson($request, $exception);
        elseif( $exception instanceof \Illuminate\Database\QueryException )
            return redirect()->back()->withInput()->withError( $this->getQueryErrorMessageByCode( $exception ) );
        
        return parent::render($request, $exception);
    }

    protected function renderExceptionAsJson( &$request, &$exception)
    {

        if ($exception instanceof \Illuminate\Http\Exceptions\HttpResponseException)
            return $exception->getResponse();


        else if($exception instanceof \Illuminate\Validation\ValidationException)
        
            return response()->json
            ([
                'error' => true,
                'messages' => $exception->errors()
            ], $exception->status);
        
        

        else if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException or $exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException)
            return response()->json
            ([
                'error' => true,
                'messages' => 'Not Found'
            ], 404);


        else if( $exception instanceof \Illuminate\Database\QueryException )
        {
            \DB::rollback();
            return response()->json
            ([
                'error' => true,
                'messages' => $this->getQueryErrorMessageByCode( $exception )  
            ]);
        }
        
    }

    protected function getQueryErrorMessageByCode( &$exception )
	{
        switch( $exception->getCode() )
        {
            case '23000':
                $message = "DATABASE ERROR 23000: el registro ya esta asociado a otros registros.";
                break;
            case '42S02':
                $message = "DATABASE ERROR 42S02: no se encuentra una de las tablas en la base de datos.";
                break;
            default:
                $message = "Ocurrio un error insesperado de base de datos.";  
        }
        return $message .  (
                                env('APP_DEBUG') ? 
                                ' -  ' . $exception->getMessage() : 
                                ''
                            );
    }

}
