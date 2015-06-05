@extends('app')

@section('content')

<div class="container">


	<!-- Form Name -->
	<legend>Adicionar usuários</legend>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Ops!</strong> Encontramos alguns erros.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="control-group">

		{!! Form::open(array('route' => 'usuarios.store', 'method' => 'post')) !!}
		{!! Form::token(); !!}
		{!! Form::hidden('id_grupo', '1', ['class' => 'form-control required']) !!}

		<div class="form-group">
			<div class="input-group">
		      <div class="input-group-addon">$</div>
		      {!! Form::text('nome', old('nome'), ['class' => 'form-control', 'required', 'placeholder' => 'Nome']) !!}
		    </div>
		</div>

	    <div class="form-group">
			<div class="input-group">
		      <div class="input-group-addon">@</div>
		      {!! Form::email('email', old('email'), ['class' => 'form-control ', 'required', 'placeholder' => 'E-mail: example@provedor.com.br']) !!}
		    </div>
		</div>

		<div class="form-group">
			<div class="input-group">
		      <div class="input-group-addon">#</div>
		      {!! Form::password('senha', ['class' => 'form-control', 'required', 'placeholder' => 'Senha']) !!}
		    </div>
		</div>

		<div class="form-group">
			<div class="input-group">
		      <div class="input-group-addon">?</div>
		      {!! Form::select('tipo', ['' => 'Tipo','Administrador' => 'Administrador', 'Cliente' => 'Cliente'] , old('tipo'), ['class' => 'form-control', 'required']);  !!}
		    </div>
		</div>

		<div class="form-group">
			<div class="input-group">
		      <div class="input-group-addon">#</div>
		      {!! Form::select('status', ['' => 'Status','1' => 'Ativo', '0' => 'Inativo'] , old('status'), ['class' => 'form-control', 'required']);  !!}
		    </div>
		</div>

		{!! Form::submit('Cadastrar!', ['class' => 'btn btn-primary']); !!}

		{!! Form::close(); !!}

	</div>

	</form>

</div>
@endsection