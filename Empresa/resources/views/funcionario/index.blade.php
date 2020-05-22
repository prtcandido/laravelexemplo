@extends('master')
@section('titulo','Lista de Funcionários')
@section('corpo')
<a href="/funcionario/create" class="btn btn-primary btn-sm">Novo</a>
<table class="table table-striped">
<tr>
	<th>Nome</th>
	<th>Endereço</th>
	<th>Data Nasc</th>
	<th></th>
</tr>
@foreach($funcionarios as $f)
<tr>
	<td>{{$f->nome}}</td>
	<td>{{$f->endereco}}</td>
	<td>{{$f->dataNascimento}}</td>
	<td>
		<a href="/funcionario/{{$f->id}}" class="btn btn-primary btn-sm">Detalhe</a>
		<a href="/funcionario/{{$f->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
	</td>
</tr> 
@endforeach
</table>
{{ $funcionarios->links() }}
@endsection