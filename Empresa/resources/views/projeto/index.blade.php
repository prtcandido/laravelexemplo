@extends('master')
@section('titulo','Lista de Projetos')
@section('corpo')
	<h3>Projetos</h3>
	<a href="projeto/create" class="btn btn-primary">Novo Projeto</a>
	<table class="table table-hover">
		<tr>
			<th>Nome</th>
			<th>Prazo</th>
			<th>Orçamento</th>
			<th></th>
		</tr>
		@foreach ($projetos as $p)
			<tr>
				<td>{{$p->nome}}</td>
				<td>{{$p->prazo}}</td>
				<td>{{$p->orcamento}}</td>
				<td>
					<a href="projeto/{{$p->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
					<a href="" class="btn btn-primary btn-sm">Excluir</a>
				</td>
			</tr>
		@endforeach
	</table>
	{{ $projetos->links() }}
@endsection