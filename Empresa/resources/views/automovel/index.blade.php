<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Automóveis</title>
</head>
<body>
	<h3>Automóveis</h3>
	<a href="/automovel/create">Criar</a>
	<table>
	<tr><th>Placa</th><th>Preoco</th><th>Cor</th></tr>
	@foreach($autos as $a)
		<tr><td>{{$a->placa}}</td><td>{{$a->preco}}</td><td>{{$a->cor}}</td>
			<td><a href="/automovel/{{$a->id}}/edit">Editar</a></td>
			<td><a href="/automovel/{{$a->id}}">Excluir</a></td>
		</tr>
	@endforeach
	</table>
</body>
</html>