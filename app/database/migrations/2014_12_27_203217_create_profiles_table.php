<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('IncSparkProfiles', function($table)
                {
                    $table->increment('id');
                    $table->integer('user_id')->unsigned;
                    $table->string('username');
                    $table->string('access_token');
                    $table->string('access_token_secret');
                    $table->biginteger('uid')->unsigned();
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
		Schema::drop('IncSparkProfiles');
	}

}
