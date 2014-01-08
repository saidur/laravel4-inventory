<?php

use Illuminate\Database\Migrations\Migration;

class CreateGames extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('games', function($table)
        {
            $table->increments('id');
            $table->string('title', 128);
            $table->string('publisher', 128);
            $table->boolean('complete');
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
		//
		 Schema::drop('games');
	}

}