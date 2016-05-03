<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceNotificationStatus extends Model
{
	
	protected $table = 'device_notification_status';
	public $timestamps = false;
	
	public function device()
	{
		return $this->belongsTo('App\Models\Device');
	}
	
	public function notification()
	{
		return $this->belongsTo('App\Models\Notification');
	}
	
}