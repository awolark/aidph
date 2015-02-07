<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseholdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('households', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('brgy_area_id')->index();
            $table->unsignedInteger('head_pers_id')->nullable()->index();
            $table->string('address', 255);
            $table->string('latlng', 50)->nullable();
            $table->text('bounds')->nullable();
            $table->string('status', 100)->nullable();
            $table->char('recstat', 1)->default('A');
            $table->timestamps();

            $table->foreign('brgy_area_id')
                ->references('id')
                ->on('areas')
                ->onDelete('cascade');

            $table->foreign('head_pers_id')
                ->references('id')
                ->on('persons')
                ->onDelete('set null');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('households');
	}

}
