<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('area_id')->unsigned();
            $table->string('username', 20);
            $table->string('password', 60);
            $table->string('email', 100);
            $table->tinyInteger('role');
            $table->string('gcm_regid', 100)->nullable();
            $table->string('image_path', 255)->nullable();
            $table->char('recstat', 1)->default('A');
            $table->timestamps();

            $table->foreign('area_id')
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
		Schema::drop('users');
	}

}
