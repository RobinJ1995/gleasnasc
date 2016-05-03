<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceNotificationStatusTable extends Migration {

	public function up()
	{
		Schema::create('deviceNotificationStatus', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('device_id')->unsigned();
			$table->integer('notification_id')->unsigned();
			$table->datetime('sent')->nullable();
			$table->datetime('delivered')->nullable();
			$table->datetime('takenAction')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('deviceNotificationStatus');
	}
}