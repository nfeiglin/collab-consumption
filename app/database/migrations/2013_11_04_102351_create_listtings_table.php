<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListtingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listtings', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('"owner_id');
			$table->string('title');
			$table->text('elevator_pitch');
			$table->text('extended_desc');
			$table->string('address1');
			$table->string('address2');
			$table->string('city');
			$table->string('state');
			$table->string('country');
            $table->string('currency');
            $table->double('security_deposit');
			$table->double('rate');
			$table->string('rate_time_period');
            $table->boolean("isPublic");
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
		Schema::drop('listtings');
	}

}
