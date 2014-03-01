<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RenameColuimnNameOnAmenityTableToReflectChangeDeskTableToListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('amenities', function(Blueprint $table) {
			$table->renameColumn('owner_desk_id', 'owner_listing_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('amenities', function(Blueprint $table) {

            $table->renameColumn('owner_listing_id', 'owner_desk_id');
        });
	}

}