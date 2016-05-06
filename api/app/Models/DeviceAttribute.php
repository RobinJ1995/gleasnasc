<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceAttribute extends Model
{
	
	protected $table = 'device_attribute';
	public $timestamps = false;
	
	public function parent()
	{
		return $this->belongsTo('App\Models\DeviceAttribute', 'parent_id');
	}
	
	public function devices()
	{
		return $this->belongsToMany('App\Models\Device');
	}
	
}