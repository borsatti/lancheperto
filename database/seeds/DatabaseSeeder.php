<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Usuarios;
use App\Grupos;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$this->call('GruposTableSeeder');
		$this->call('UsuariosTableSeeder');
	}

}

class GruposTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Grupos::create(['nome' => 'Administradores']);
		$this->command->info('Grupos padrao adicionado!');
	}

}



class UsuariosTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Usuarios::create([
			'id_grupo' => '1',
			'nome' => 'Administrador',
			'email' => 'borsatti14@gmail.com',
			'senha' => '123321',
			'tipo' => 'Administrador',
			'status' => 1
			]);
		$this->command->info('Usuario padrao adicionado!');
	}

}
