<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissoes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_grupo')->unsigned()->nullable();
			$table->foreign('id_grupo')->references('id')->on('grupos')->onDelete('cascade');
			$table->string('modulo', 100)->index();
			$table->enum('tipo', [0,1])->index();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissoes');
	}

}
