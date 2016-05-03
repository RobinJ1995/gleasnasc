<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationTable extends Migration {

	public function up()
	{
		Schema::create('application', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 128)->nullable();
			$table->string('packageName', 255)->unique();
		});
	}

	public function down()
	{
		Schema::drop('application');
	}
}