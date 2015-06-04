<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model {

	protected $fillable = ['id_grupo', 'nome','email', 'senha', 'tipo', 'status'];

}
