@extends('master')
@section('titulo','Funcionário')
@section('corpo')
	<div class="container">
		<h3>Funcionário</h3>
		<div class="row">
			<div class="col-sm-6">
				<dl>
					<dt>Nome</dt>
					<dd>{{$funcionario->nome}}</dd>
					<dt>Endereço</dt>
					<dd>{{$funcionario->endereco}}</dd>
					<dt>Endereço</dt>
					<dd>{{$funcionario->endereco}}</dd>
					<dt>Data Nascimento</dt>
					<dd>{{$funcionario->dataNascimento}}</dd>
				</dl>
				<h3>Projetos</h3>
				@foreach($proj as $p)
					<p>{{$p->id}} - {{$p->descricao}} - {{$p->orcamento}}</p>
				@endforeach
				<form action="/funcionario/{{$funcionario->id}}" method="post" onsubmit="return confirm('Confirma exclusão?')">
					@csrf
					@method('DELETE')
					<input type="submit" value="Excluir" class="btn btn-primary btn-sm">
					<a href="/funcionario" class="btn btn-primary btn-sm">Voltar</a>
				</form>
			</div>
		</div>
	</div>
@endsection