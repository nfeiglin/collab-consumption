<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddChangesToListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('listings', function(Blueprint $table) {

            $table->dropColumn('address2', 'security_deposit','rate', 'rate_time_period');


            $table->boolean('wifi')->after('extended_desc');
            $table->boolean('coffee_machine');
            $table->boolean('heating');
            $table->boolean('parking');
            $table->boolean('aircon');
            $table->boolean('couches');
           $table->text('faqs');
            $table->decimal('daily_rate', 10, 2);
            $table->decimal('weekly_rate', 10, 2);
            $table->decimal('monthly_rate', 10, 2);

            $table->renameColumn('owner_id', 'owner_id');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('listings', function(Blueprint $table) {
            $table->dropColumn('wifi','heating','aircon', 'coffee_machine','couches','faqs', 'daily_rate','weekly_rate','monthly_rate');
		});
	}

}
