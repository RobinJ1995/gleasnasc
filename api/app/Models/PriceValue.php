<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceValue extends Model
{
	
	protected $table = 'priceValue';
	public $timestamps = false;
	
	public function price()
	{
		return $this->hasOne('Price');
	}
	
	public function currency()
	{
		return $this->hasOne('Currency');
	}
	
}