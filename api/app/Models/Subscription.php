<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
	
	protected $table = 'subscription';
	public $timestamps = true;
	
	public function user()
	{
		return $this->hasOne('User');
	}
	
	public function subscriptionType()
	{
		return $this->hasOne('SubscriptionType');
	}
	
}