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
		return $this->belongsToMany('App\Models\Role')->withTimestamps ();
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
			'exp' => time () + 60 * 60 * 24 * 7,
			'user' => [
				'id' => $this->id,
				'username' => $this->username,
				'email' => $this->email
			]
		];
	}

	public function setPasswordAttribute ($value)
	{
		$this->attributes['password'] = app ('hash')->make ($value);
	}

	public function checkPassword ($password)
	{
		return app ('hash')->check ($password, $this->password);
	}
}