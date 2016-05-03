<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionTypeTable extends Migration {

	public function up()
	{
		Schema::create('subscriptionType', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 64)->unique();
			$table->integer('price_monthly_id')->unsigned()->nullable();
			$table->integer('price_yearly_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('subscriptionType');
	}
}