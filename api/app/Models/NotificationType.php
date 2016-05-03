<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
	
	protected $table = 'notificationType';
	public $timestamps = false;
	
	public function notifications()
	{
		return $this->hasMany('Notification');
	}
	
}