<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('persons', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('hh_id')->nullable()->index();;
            $table->unsignedInteger('parent_id')->nullable()->index();
            $table->string('f_name', 50);
            $table->string('l_name', 50);
            $table->string('m_name', 50);
            $table->date('b_date')->nullable();
            $table->string('address', 100)->nullable();
            $table->string('sex', 6);
            $table->string('contact_no', 50)->nullable();
            $table->string('occupation', 50)->nullable();
            $table->char('pwd');
            $table->string('image_path', 255)->nullable();
            $table->string('status', 100)->nullable();
            $table->char('recstat', 1)->default('A');
            $table->timestamps();

            $table->foreign('parent_id')
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
		Schema::drop('persons');
	}

}
