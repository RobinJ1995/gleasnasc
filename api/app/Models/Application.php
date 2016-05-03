<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

	protected $table = 'application';
	public $timestamps = true;

	public function notifications()
	{
		return $this->hasMany('Notification');
	}

}