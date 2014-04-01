<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('purchase_id');
			$table->integer('product_id');
			$table->text('product_name');
			$table->integer('quantity');
			$table->double('unit_price');
			$table->double('gross_total');
			$table->integer('user');
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
		Schema::drop('purchase_products');
	}

}
