<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class OrderItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id');
			$table->integer('product_id');
			$table->text('product_name');
			$table->text('note');
			$table->integer('user');
			$table->integer('apprv_qty');
			$table->integer('apprv_userid');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_products');
	}

}
