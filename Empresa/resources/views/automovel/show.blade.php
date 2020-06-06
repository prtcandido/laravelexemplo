<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Confirma exclusão do automóvel de placa {{$auto->placa}}?</h3>
	<form action="/automovel/{{$auto->id}}" method="post">
		@csrf
		@method('DELETE')
		<input type="submit" value="Confirmar">
	</form>
</body>
</html>