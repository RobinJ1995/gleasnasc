<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceAttribute extends Model
{
	
	protected $table = 'deviceAttribute';
	public $timestamps = false;
	
	public function parent()
	{
		return $this->belongsTo('DeviceAttribute', 'parent_id');
	}
	
	public function devices()
	{
		return $this->belongsToMany('Device');
	}
	
}