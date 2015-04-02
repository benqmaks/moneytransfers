<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exchanges', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('phone');
            $table->string('summ');
            $table->string('money_type');
            $table->string('city');
            $table->string('commission')->default('0');
            $table->enum('ad_type',['refill','cashing']);
            $table->string('comment');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exchanges');
	}

}
