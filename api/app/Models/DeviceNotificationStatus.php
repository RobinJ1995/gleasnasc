<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceNotificationStatus extends Model
{
	
	protected $table = 'deviceNotificationStatus';
	public $timestamps = false;
	
	public function device()
	{
		return $this->belongsTo('Device');
	}
	
	public function notification()
	{
		return $this->belongsTo('Notification');
	}
	
}