@extends('master')
@section('titulo','Criar Funcionário')
@section('corpo')
	<div class="container">
		<h3>Documento</h3>
		<div class="row">
			<div class="col-sm-6">
				<form action="/funcionario/documento" method="post" enctype="multipart/form-data">
					@csrf  <!-- token de segurança -->
					<input type="hidden" name="funcionario_id" value="{{$id}}">
					<div class="form-group">
						<label for="arquivo">Arquivo</label>
						<input type="file" name="arquivo" id="arquivo" class="form-control"/>
						@if($errors->has('arquivo'))
						<p class="text-danger">{{$errors->first('arquivo')}}</p>
						@endif
					</div>
					<div class="form-group">
		    			<input type="submit" value="Salvar" class="btn btn-primary btn-sm"/>
		    			<a href="/funcionario" class="btn btn-primary btn-sm">Voltar</a>
		    		</div>
				</form>
			</div>
		</div>
	</div>
@endsection