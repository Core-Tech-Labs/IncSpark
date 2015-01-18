<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('IncSparkEvents', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('images');
                        $table->string('event_name');
                        $table->integer('event_time');
                        $table->string('event_location');
                        $table->string('event_url');
                        // If other tables need to be added. Add them below this comment line
                        
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
		Schema::drop('IncSparkEvents');
	}

}
