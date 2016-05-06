<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	
	protected $table = 'notification';
	public $timestamps = true;
	
	public function device()
	{
		return $this->belongsTo('App\Models\Device');
	}
	
	public function application()
	{
		return $this->belongsTo('App\Models\Application');
	}
	
	public function notificationType()
	{
		return $this->belongsTo('App\Models\NotificationType');
	}

	public function deviceNotificationStatus ()
	{
		return $this->hasMany ('App\Models\DeviceNotificationStatus');
	}
}