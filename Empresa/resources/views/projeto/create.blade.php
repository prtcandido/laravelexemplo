@extends('master')
@section('titulo','Novo Projeto')
@section('corpo')
<div class="container">
<div class="row">
 <div class="col-sm-6">
	<form action="/projeto" method="post">

		<!-- Gera token -->
		@csrf

		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" id="nome" class="form-control" />
		</div>
		<div class="form-group">
			<label for="prazo">Prazo</label>
			<input type="number" name="prazo" id="prazo" class="form-control" />
		</div>
		<div class="form-group">
			<label for="orcamento">Orçamento</label>
			<input type="number" name="orcamento" id="orcamento" class="form-control" />
		</div>
		<input type="submit" value="Gravar" class="btn btn-primary" />
	</form>
  </div>
</div>
</div>  
@endsection