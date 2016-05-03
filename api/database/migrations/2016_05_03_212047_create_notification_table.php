<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationTable extends Migration {

	public function up()
	{
		Schema::create('notification', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('device_id')->unsigned();
			$table->integer('application_id')->unsigned();
			$table->string('key', 128);
			$table->datetime('postTime')->nullable();
			$table->boolean('clearable')->nullable();
			$table->boolean('ongoing')->nullable();
			$table->integer('notification_type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('notification');
	}
}