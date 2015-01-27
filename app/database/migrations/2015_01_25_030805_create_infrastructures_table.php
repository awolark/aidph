<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInfrastructuresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('infrastructures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('brgy_area_id')->unsigned()->index();
			$table->string('name', 100);
			$table->string('type', 30);
			$table->string('location', 255);
			$table->string('latlng', 50)->nullable();
			$table->text('remarks')->nullable();
			$table->string('status', 50)->default('OK');
			$table->char('recstat')->default('A');
			$table->timestamps();

            $table->foreign('brgy_area_id')
                ->references('id')
                ->on('areas');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('infrastructures');
	}

}
