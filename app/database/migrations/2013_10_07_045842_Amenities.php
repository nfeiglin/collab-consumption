<?php

use Illuminate\Database\Migrations\Migration;

class Amenities extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

Schema::create('amenities', function($table) {
	$table->increments('id');
	$table->string('type', 80);
	$table->boolean('has_amenity');
	$table->string('description', 300);
	$table->integer('owner_desk_id');
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
		Schema::drop(amenities);
	}

}