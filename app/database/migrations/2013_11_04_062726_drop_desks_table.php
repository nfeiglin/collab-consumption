<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropDesksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('desks', function(Blueprint $table) {
			$table->drop('desks');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('desks', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('private');
            $table->string('ownerUsername', 128);
            $table->string('title', 128);
            $table->text('elevatorPitch');
            $table->string('companyName', 300);
            $table->text('longDescription');
            $table->string('address', 300);
            $table->string('city', 128);
            $table->string('state', 128);
            $table->string('country', 128);
            $table->string('zipCode', 60);
            $table->float('dailyrate', 8, 2);
            $table->float('cleaningfee', 8, 2);
            $table->string('currency', 3);
            $table->timestamps();
            $table->softDeletes();
		});
	}

}
