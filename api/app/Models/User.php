<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	
	protected $table = 'user';
	public $timestamps = true;
	
	public function roles()
	{
		return $this->belongsToMany('Role');
	}
	
	public function devices()
	{
		return $this->hasMany('Device');
	}
	
}