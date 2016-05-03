<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	
	protected $table = 'notification';
	public $timestamps = true;
	
	public function device()
	{
		return $this->belongsTo('Device');
	}
	
	public function application()
	{
		return $this->belongsTo('Application');
	}
	
	public function notificationType()
	{
		return $this->belongsTo('NotificationType');
	}
	
}