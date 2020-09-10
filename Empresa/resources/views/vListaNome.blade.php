<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<a href="/funcionario/create">Criar Novo Funcionário</a>

	<hr/>

	@foreach($vf as $a)
		<p>{{ $a->nome }} - {{$a->endereco}}<p>
	@endforeach

</body>
</html>