@extends('master')
@section('titulo','Lista de Funcionários')
@section('corpo')
<table class="table table-striped">
<tr>
	<th>Nome</th>
	<th>Endereço</th>
</tr>
@foreach($funcionarios as $f)
<tr>
	<td>{{$f->nome}}</td>
	<td>{{$f->endereco}}</td>
</tr> 
@endforeach
</table>
{{ $funcionarios->links() }}
@endsection