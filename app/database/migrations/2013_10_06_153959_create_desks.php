<?php
// app/database/migrations/create_desks.php

use Illuminate\Database\Migrations\Migration;

class CreateDesks extends Migration {
 /**
* Run the migrations.
*
* @return void
*/
 public function up()
 {
 Schema::create('desks', function($table)
 {
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
 /**
* Reverse the migrations.
*
* @return void
*/
 public function down()
 {
 Schema::drop('desks');
 }
}


?>