<?php

use Illuminate\Database\Migrations\Migration;

class ModifyUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->dropColumn('address1', 'address2', 'country', 'city', 'state', 'postcode', 'dateofbirth');
			$table->boolean('isActive');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{

			$table->string('address1');
			$table->string('address2');
			$table->string('country');
			$table->string('city');
			$table->string('state');
			$table->string('postcode');
			$table->date('dateofbirth');
		});
	}

}