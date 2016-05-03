<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	
	protected $table = 'role';
	public $timestamps = false;
	
	public function users()
	{
		return $this->belongsToMany('User');
	}
	
	public function permissions()
	{
		return $this->belongsToMany('Permission');
	}
	
}