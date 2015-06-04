<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_grupo')->unsigned()->nullable();
			$table->foreign('id_grupo')->references('id')->on('grupos')->onDelete('set null');
			$table->string('nome', 100)->nullable()->default('NULL')->index();
			$table->string('email', 100)->unique()->index();
			$table->string('senha', 60);
			$table->enum('tipo', ['Administrador','Cliente'])->index();
			$table->enum('status', [0,1])->index();
			$table->rememberToken();
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
		Schema::drop('usuarios');
	}

}
