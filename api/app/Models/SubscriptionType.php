<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
	
	protected $table = 'subscription_type';
	public $timestamps = false;
	
	public function priceMonthly()
	{
		return $this->hasOne('App\Models\Price', 'price_monthly_id');
	}
	
	public function priceYearly()
	{
		return $this->hasOne('App\Models\Price', 'price_yearly_id');
	}
	
}