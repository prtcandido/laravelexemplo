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
						<input type="text" name="nome" id="nome" class="form-control"/>	
					</div>
					<div>
						<label for="endereco">Endereco</label>
						<input type="text" name="endereco" id="endereco" class="form-control"/>
					</div>
		    		<input type="submit" value="Criar" class="btn btn-primary"/>
				</form>
			</div>
		</div>
	</div>
@endsection