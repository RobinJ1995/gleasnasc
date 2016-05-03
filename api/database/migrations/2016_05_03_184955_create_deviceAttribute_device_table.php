<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceAttributeDeviceTable extends Migration {

	public function up()
	{
		Schema::create('deviceAttribute_device', function(Blueprint $table) {
			$table->integer('device_id')->unsigned();
			$table->integer('deviceAttribute_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('deviceAttribute_device');
	}
}