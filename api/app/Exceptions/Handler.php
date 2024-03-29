<?php

namespace App\Exceptions;

use App\ApplicationError;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		AuthorizationException::class,
		HttpException::class,
		ModelNotFoundException::class,
		ValidationException::class,
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception $e
	 *
	 * @return void
	 */
	public function report(Exception $e)
	{
		parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Exception $e
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		//if ($e instanceof ValidationException) //TODO// https://github.com/generationtux/jwt-artisan/issues/11 //
			return parent::render ($request, $e);

		$obj = [
			'error' => true,
			'message' => $e->getMessage ()
		];

		if (env ('APP_DEBUG', false))
		{
			$obj['file'] = $e->getFile ();
			$obj['line'] = $e->getLine ();
			$obj['trace'] = $e->getTrace ();
		}

		return response ()->json ($obj);
	}
}
