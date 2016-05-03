<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
	
	protected $table = 'currency';
	public $timestamps = false;
	
	public function priceValues()
	{
		return $this->hasMany('App\Models\PriceValue');
	}
	
}