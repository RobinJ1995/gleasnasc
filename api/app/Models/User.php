<?php

namespace App\Models;

use GenTux\Jwt\JwtPayloadInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements
	AuthenticatableContract,
	AuthorizableContract,
	JwtPayloadInterface
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

	public function subscriptions ()
	{
		return $this->hasMany ('App\Models\Subscription');
	}

	public function getPayload ()
	{
		return [
			'sub' => $this->id,
			'exp' => time () + 60 * 60 * 24 * 7,
			'context' => [
				'email' => $this->email
			]
		];
	}

	public function setPasswordAttribute ($value)
	{
		$this->attributes['password'] = app ('hash')->make ($value);
	}
}