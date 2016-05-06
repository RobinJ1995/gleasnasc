<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceTable extends Migration {

	public function up()
	{
		Schema::create('device', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 128)->nullable();
			$table->string('identifier', 64)->unique();
			$table->integer('user_id')->unsigned();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('device');
	}
}