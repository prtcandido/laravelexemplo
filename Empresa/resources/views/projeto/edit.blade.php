@extends('master')
@section('titulo','Editar Projeto')
@section('corpo')
<div class="container">
<div class="row">
 <div class="col-sm-6">
	<form action="/projeto/{{$proj->id}}" method="post">

		<!-- Gera token -->
		@csrf

		@method('put')

		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" id="nome" value="{{$proj->nome}}" class="form-control" />
		</div>
		<div class="form-group">
			<label for="prazo">Prazo</label>
			<input type="number" name="prazo" id="prazo" value="{{$proj->prazo}}" class="form-control" />
		</div>
		<div class="form-group">
			<label for="orcamento">Orçamento</label>
			<input type="number" name="orcamento" id="orcamento" value="{{$proj->orcamento}}" class="form-control" />
		</div>
		<input type="submit" value="Gravar" class="btn btn-primary" />
	</form>
  </div>
</div>
</div>  
@endsection