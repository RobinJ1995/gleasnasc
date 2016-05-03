<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrencyTable extends Migration {

	public function up()
	{
		Schema::create('currency', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 8)->unique();
		});
	}

	public function down()
	{
		Schema::drop('currency');
	}
}