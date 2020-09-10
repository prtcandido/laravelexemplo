@extends('master')
@section('titulo','Lista de Projetos')
@section('corpo')
	<h3>Projetos</h3>
	<table class="table table-hover">
		<tr>
			<th>Nome</th>
			<th>Prazo</th>
			<th>Orçamento</th>
		</tr>
		@foreach ($projetos as $p)
			<tr>
				<td>{{$p->nome}}</td>
				<td>{{$p->prazo}}</td>
				<td>{{$p->orcamento}}</td>
			</tr>
		@endforeach
	</table>
	{{ $projetos->links() }}
@endsection