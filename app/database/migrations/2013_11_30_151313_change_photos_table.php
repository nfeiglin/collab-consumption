<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ChangePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('photos', function(Blueprint $table) {
            $table->dropColumn('caption', 'private', 'listingtype');
            $table->renameColumn('listingid', 'listing_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('photos', function(Blueprint $table){
            $table->string('caption');
            $table->string('listingtype');
            $table->boolean('private');
           $table->renameColumn('listing_id' ,'listingid');
        });
	}

}
