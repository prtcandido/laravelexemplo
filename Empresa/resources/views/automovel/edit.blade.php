<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Criar</title>
</head>
<body>
	<h3>Criar Automóvel</h3>
	<form action="/automovel/{{$auto->id}}" method="post">
		@csrf
		@method('PUT')
		<div>
			<label>Placa</label>
			<input type="text" name="placa" value="{{$auto->placa}}">
		</div>
		<div>
			<label>Preço</label>
			<input type="number" name="preco" value="{{$auto->preco}}">
		</div>
		<div>
			<label>Cor</label>
			<input type="text" name="cor" value="{{$auto->cor}}">
		</div>
		<div>
			<input type="submit" value="Salvar">
		</div>
	</form>
</body>
</html>