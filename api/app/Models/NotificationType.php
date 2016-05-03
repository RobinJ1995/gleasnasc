<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
	
	protected $table = 'notification_type';
	public $timestamps = false;
	
	public function notifications()
	{
		return $this->hasMany('App\Models\Notification');
	}
	
}