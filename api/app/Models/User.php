<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements
	AuthenticatableContract,
	AuthorizableContract
{
	use Authenticatable, Authorizable;
	
	protected $table = 'user';
	public $timestamps = true;
	
	protected $hidden = [
		'password',
	];
	
	public function roles()
	{
		return $this->belongsToMany('App\Models\Role');
	}
	
	public function devices()
	{
		return $this->hasMany('App\Models\Device');
	}

	public function setPasswordAttribute ($value)
	{
		$this->attributes['password'] = app ('hash')->make ($value);
	}
}