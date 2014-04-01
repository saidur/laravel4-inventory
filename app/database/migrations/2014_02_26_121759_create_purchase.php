<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase', function(Blueprint $table) {
			$table->increments('id');
			$table->text('reference_no');
			$table->integer('store_id');
			$table->integer('supplier_id');
			$table->text('supplier_name');
			$table->date('date');
			$table->text('note');
			$table->double('total');
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
		Schema::drop('purchase');
	}

}
