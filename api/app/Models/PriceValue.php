<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceValue extends Model
{
	
	protected $table = 'price_value';
	public $timestamps = false;
	
	public function price()
	{
		return $this->hasOne('App\Models\Price');
	}
	
	public function currency()
	{
		return $this->hasOne('App\Models\Currency');
	}
	
}