<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	public function up()
	{
		Schema::create('user', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('username', 32)->unique();
			$table->string('email', 128)->unique();
			$table->string('password', 60);
			$table->rememberToken('remember_token');
		});
	}

	public function down()
	{
		Schema::drop('user');
	}
}