<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationTypeTable extends Migration {

	public function up()
	{
		Schema::create('notification_type', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 64)->unique();
		});
	}

	public function down()
	{
		Schema::drop('notification_type');
	}
}