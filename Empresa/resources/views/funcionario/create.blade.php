@extends('master')
@section('titulo','Criar Funcionário')
@section('corpo')
	<div class="container">
		<h3>Novo Funcionário</h3>
		<div class="row">
			<div class="col-sm-6">
				<form action="/funcionario" method="post">
					@csrf  <!-- token de segurança -->
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" name="nome" id="nome" class="form-control" value="{{old('nome')}}"/>
						@if($errors->has('nome'))
						<p class="text-danger">{{$errors->first('nome')}}</p>
						@endif
					</div>
					<div class="form-group">
						<label for="endereco">Endereco</label>
						<input type="text" name="endereco" id="endereco" class="form-control" value="{{old('endereco')}}"/>
						@if($errors->has('endereco'))
						<p class="text-danger">{{$errors->first('endereco')}}</p>
						@endif
					</div>
					<div class="form-group">
						<label for="dataNascimento">Data Nascimento</label>
						<input type="date" name="dataNascimento" id="dataNascimento" class="form-control" value="{{old('dataNascimento')}}"/>
						@if($errors->has('dataNascimento'))
						<p class="text-danger">{{$errors->first('dataNascimento')}}</p>
						@endif
					</div>
					<div lass="form-group">
						<label for="departamento_id">Departamento</label>
						<select name="departamento_id" id="departamento_id" class="form-control">
							@foreach($deptos as $d)
								<option value="{{$d->id}}">{{$d->nome}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
		    			<input type="submit" value="Criar" class="btn btn-primary btn-sm"/>
		    			<a href="/funcionario" class="btn btn-primary btn-sm">Voltar</a>
		    		</div>
				</form>
			</div>
		</div>
	</div>
@endsection