<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categorias_clientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idCliente')->unsigned();
			$table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade');
			$table->integer('idCategoria')->unsigned();
			$table->foreign('idCategoria')->references('id')->on('categorias')->onDelete('cascade');
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
		Schema::drop('categorias__clientes');
	}

}
