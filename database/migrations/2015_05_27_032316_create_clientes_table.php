<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idPlano')->unsigned()->nullable();
			$table->foreign('idPlano')->references('id')->on('planos')->onDelete('set null');
			$table->string('nome', 100)->index();
			$table->string('email', 100);
			$table->string('titular', 100);
			$table->string('cpf', 11)->nullable()->default('NULL');
			$table->string('cnpj', 14)->nullable()->default('NULL');
			$table->text('descricao')->nullable();	
			$table->text('chaves');
			$table->boolean('ativo');
			$table->string('endereco', 100);
			$table->string('bairro', 100);
			$table->string('complemento', 200)->nullable()->default('NULL');
			$table->integer('numero');
			$table->integer('cep');
			$table->string('cidade',150);
			$table->string('estado', 2);
			$table->string('pais', 30)->default('Brasil');

			$table->timestamps();
		});

		//ALTER TABLE  `clientes` ADD FULLTEXT (`chaves`);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clientes');
	}

}
