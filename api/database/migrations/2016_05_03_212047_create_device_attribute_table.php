<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceAttributeTable extends Migration {

	public function up()
	{
		Schema::create('device_attribute', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 64)->unique();
			$table->integer('parent_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('device_attribute');
	}
}