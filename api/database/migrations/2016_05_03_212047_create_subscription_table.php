<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionTable extends Migration {

	public function up()
	{
		Schema::create('subscription', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->integer('subscription_type_id')->unsigned();
			$table->datetime('expires')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('subscription');
	}
}