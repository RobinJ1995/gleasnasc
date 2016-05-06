<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
	
	protected $table = 'subscription';
	public $timestamps = true;
	
	public function user()
	{
		return $this->hasOne('App\Models\User');
	}
	
	public function subscriptionType()
	{
		return $this->hasOne('App\Models\SubscriptionType');
	}
	
}