<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
	
	protected $table = 'price';
	public $timestamps = false;
	
	public function subscriptionsMonthly()
	{
		return $this->belongsTo('SubscriptionType', 'price_monthly_id');
	}
	
	public function subscriptionsYearly()
	{
		return $this->belongsTo('SubscriptionType', 'price_yearly_id');
	}
	
	public function priceValues()
	{
		return $this->hasMany('PriceValue');
	}
	
}