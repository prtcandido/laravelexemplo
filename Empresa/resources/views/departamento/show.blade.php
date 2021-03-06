@extends('master')
@section('titulo','Departamento')
@section('corpo')
	<h3>{{$departamento->sigla}}</h3>
	<h3>{{$departamento->nome}}</h3>
	@foreach( $departamento->hasMany('App\Funcionario')->get() as $f )
		<p>{{$f->nome}}</p>
	@endforeach
@endsection