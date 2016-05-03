<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceDeviceAttributeTable extends Migration {

	public function up()
	{
		Schema::create('device_device_attribute', function(Blueprint $table) {
			$table->integer('device_id')->unsigned();
			$table->integer('device_attribute_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('device_device_attribute');
	}
}