<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
	
	protected $table = 'subscriptionType';
	public $timestamps = false;
	
	public function priceMonthly()
	{
		return $this->hasOne('Price', 'price_monthly_id');
	}
	
	public function priceYearly()
	{
		return $this->hasOne('Price', 'price_yearly_id');
	}
	
}