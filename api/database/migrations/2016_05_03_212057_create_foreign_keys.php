<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('role_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('user')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('role_user', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('role')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('device', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('user')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('device_attribute', function(Blueprint $table) {
			$table->foreign('parent_id')->references('id')->on('device_attribute')
						->onDelete('set null')
						->onUpdate('restrict');
		});
		Schema::table('device_device_attribute', function(Blueprint $table) {
			$table->foreign('device_id')->references('id')->on('device')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('device_device_attribute', function(Blueprint $table) {
			$table->foreign('device_attribute_id')->references('id')->on('device_attribute')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('permission_role', function(Blueprint $table) {
			$table->foreign('permission_id')->references('id')->on('permission')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('permission_role', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('role')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('subscription_type', function(Blueprint $table) {
			$table->foreign('price_monthly_id')->references('id')->on('price')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('subscription_type', function(Blueprint $table) {
			$table->foreign('price_yearly_id')->references('id')->on('price')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('price_value', function(Blueprint $table) {
			$table->foreign('price_id')->references('id')->on('price')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('price_value', function(Blueprint $table) {
			$table->foreign('currency_id')->references('id')->on('currency')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('subscription', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('user')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('subscription', function(Blueprint $table) {
			$table->foreign('subscription_type_id')->references('id')->on('subscription_type')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('notification', function(Blueprint $table) {
			$table->foreign('device_id')->references('id')->on('device')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('notification', function(Blueprint $table) {
			$table->foreign('application_id')->references('id')->on('application')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('notification', function(Blueprint $table) {
			$table->foreign('notification_type_id')->references('id')->on('notification')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('device_notification_status', function(Blueprint $table) {
			$table->foreign('device_id')->references('id')->on('device')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('device_notification_status', function(Blueprint $table) {
			$table->foreign('notification_id')->references('id')->on('notification')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('role_user', function(Blueprint $table) {
			$table->dropForeign('role_user_user_id_foreign');
		});
		Schema::table('role_user', function(Blueprint $table) {
			$table->dropForeign('role_user_role_id_foreign');
		});
		Schema::table('device', function(Blueprint $table) {
			$table->dropForeign('device_user_id_foreign');
		});
		Schema::table('device_attribute', function(Blueprint $table) {
			$table->dropForeign('device_attribute_parent_id_foreign');
		});
		Schema::table('device_device_attribute', function(Blueprint $table) {
			$table->dropForeign('device_device_attribute_device_id_foreign');
		});
		Schema::table('device_device_attribute', function(Blueprint $table) {
			$table->dropForeign('device_device_attribute_device_attribute_id_foreign');
		});
		Schema::table('permission_role', function(Blueprint $table) {
			$table->dropForeign('permission_role_permission_id_foreign');
		});
		Schema::table('permission_role', function(Blueprint $table) {
			$table->dropForeign('permission_role_role_id_foreign');
		});
		Schema::table('subscription_type', function(Blueprint $table) {
			$table->dropForeign('subscription_type_price_monthly_id_foreign');
		});
		Schema::table('subscription_type', function(Blueprint $table) {
			$table->dropForeign('subscription_type_price_yearly_id_foreign');
		});
		Schema::table('price_value', function(Blueprint $table) {
			$table->dropForeign('price_value_price_id_foreign');
		});
		Schema::table('price_value', function(Blueprint $table) {
			$table->dropForeign('price_value_currency_id_foreign');
		});
		Schema::table('subscription', function(Blueprint $table) {
			$table->dropForeign('subscription_user_id_foreign');
		});
		Schema::table('subscription', function(Blueprint $table) {
			$table->dropForeign('subscription_subscription_type_id_foreign');
		});
		Schema::table('notification', function(Blueprint $table) {
			$table->dropForeign('notification_device_id_foreign');
		});
		Schema::table('notification', function(Blueprint $table) {
			$table->dropForeign('notification_application_id_foreign');
		});
		Schema::table('notification', function(Blueprint $table) {
			$table->dropForeign('notification_notification_type_id_foreign');
		});
		Schema::table('device_notification_status', function(Blueprint $table) {
			$table->dropForeign('device_notification_status_device_id_foreign');
		});
		Schema::table('device_notification_status', function(Blueprint $table) {
			$table->dropForeign('device_notification_status_notification_id_foreign');
		});
	}
}