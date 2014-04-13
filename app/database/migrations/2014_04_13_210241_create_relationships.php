<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prices', function($table) {
			$table->integer('source_id')->unsigned();
		});

		Schema::table('sources', function($table) {
			$table->integer('currency_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prices', function($table) {
			$table->dropColumn('source_id');
		});

		Schema::table('sources', function($table) {
			$table->dropColumn('currency_id');
		});
	}

}
