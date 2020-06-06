<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Criar</title>
</head>
<body>
	<h3>Criar Automóvel</h3>
	<form action="/automovel" method="post">
		@csrf
		<div>
			<label>Placa</label>
			<input type="text" name="placa">
		</div>
		<div>
			<label>Preço</label>
			<input type="number" name="preco">
		</div>
		<div>
			<label>Cor</label>
			<input type="text" name="cor">
		</div>
		<div>
			<input type="submit" value="Salvar">
		</div>
	</form>
</body>
</html>