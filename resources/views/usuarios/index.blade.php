@extends('app')

@section('content')

<div class="container">


	<!-- Form Name -->
	<legend>Listagem de usuários</legend>

        <div class="col-sx-12">

        	<div class="table-responsive">

	           <table class="table table-striped">
	                <tbody><tr>
	                    <th>Nome</th>
	                    <th>E-mail</th>
	                    <th>Tipo</th>
	                    <th>Status</th>
	                    <th>Ações</th>
	                </tr>
	                @foreach ($usuarios as $usuario)

		                <tr>
		                    <td>{!! $usuario->nome !!}</td>
		                    <td>{!! $usuario->email !!}</td>
		                    <td>{!! $usuario->tipo !!}</td>
		                    <td>{!! ($usuario->status == 1) ? 'Ativo' : Inativo !!}</td>
		                    <td>Editar / Excluir</td>
		                </tr>

	                @endforeach
	            </tbody>
	       	</table>

	       </div>
        </div>


</div>
@endsection