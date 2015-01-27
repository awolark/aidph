<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('areas', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('name', 100);
            $table->string('type', 10);
            $table->string('contact_person', 100);
            $table->string('contact_no', 50);
            $table->string('latlng', 50)->nullable();
            $table->text('bounds')->nullable();
            $table->string('org_chart_path', 255)->nullable();
            $table->string('status', 100)->nullable();
            $table->char('recstat', 1)->default('A');
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('areas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('areas');
	}

}
