<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyHhIdOnPersonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('persons', function(Blueprint $table)
		{
            $table->foreign('hh_id')
                ->references('id')
                ->on('households')
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
		Schema::table('persons', function(Blueprint $table)
		{
            $table->dropForeign('persons_hh_id_foreign');
		});
	}

}
