<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
	
	protected $table = 'device';
	public $timestamps = true;
	
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	
	public function deviceAttributes()
	{
		return $this->belongsToMany('DeviceAttribute');
	}
	
	public function user()
	{
		return $this->belongsTo('User');
	}
	
}