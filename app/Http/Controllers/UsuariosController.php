<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;
use Redirect;
use App\Usuarios;
use Lang;
use Validator;
use Hash;
use Session;
class UsuariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = Usuarios::orderBy('nome')->get();
		return view('usuarios.index', compact('usuarios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{


		$rules = [
					'nome' => 'required',
					'email' => 'required|email|unique:usuarios',
					'senha' => 'required|min:8',
					'tipo' => 'required',
					'status' => 'required'
				 ];

		$messages = [
					 'nome.required' => Lang::get('forms.required', ['campo' => 'Nome']),
					 'email.required' => Lang::get('forms.required', ['campo' => 'E-mail']),
					 'email.email' => Lang::get('forms.format', ['campo' => 'E-mail', 'formato' => 'email@example.com.br']),
					 'email.unique' => Lang::get('forms.unique', ['campo' => 'E-mail', 'valor' => Input::get('email')]),
					 'senha.required' => Lang::get('forms.required', ['campo' => 'Senha']),
					 'senha.min' => Lang::get('forms.min', ['campo' => 'Senha', 'quantidade' => '8']),
					 'tipo.required' => Lang::get('forms.required', ['campo' => 'Tipo']),
					 'status.required' => Lang::get('forms.required', ['campo' => 'Status'])
		];

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails())
	    {
	        return redirect()->back()->withInput(Input::except('senha'))->withErrors($validator);
	    }

		Usuarios::create([
			'id_grupo' => Input::get('id_grupo'),
			'nome' => Input::get('nome'),
			'email' => Input::get('email'),
			'senha' => Hash::make(Input::get('senha')),
			'tipo' => Input::get('tipo'),
			'status' => Input::get('status'),
		]);

		//return redirect()->route('usuarios.index', ['user' => 1]);
		return Redirect::route('usuarios.index', ['create' => true]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
