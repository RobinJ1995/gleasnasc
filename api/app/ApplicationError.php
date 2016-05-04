<?php

namespace App;

class ApplicationError
{
	public $message;
	public $file;
	public $line;
	public $trace;
	public $error = true;

	function __construct (\Exception $ex)
	{
		$this->message = $ex->getMessage ();
		$this->file = $ex->getFile ();
		$this->line = $ex->getLine ();
		$this->trace = $ex->getTrace ();
	}

	function response ()
	{
		return response ()->json (env ('APP_DEBUG', false) ? $this : [ 'message' => $this->message ]);
	}
}