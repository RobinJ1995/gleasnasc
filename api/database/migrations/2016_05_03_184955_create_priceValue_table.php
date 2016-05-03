<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceValueTable extends Migration {

	public function up()
	{
		Schema::create('priceValue', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('price_id')->unsigned();
			$table->integer('currency_id')->unsigned();
			$table->decimal('value', 8,2);
		});
	}

	public function down()
	{
		Schema::drop('priceValue');
	}
}