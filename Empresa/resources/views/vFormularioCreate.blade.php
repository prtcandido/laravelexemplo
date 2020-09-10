<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="/funcionario">
		@csrf
		<label>Nome</label>
		<input type="text" name="nome">
		<label>Endereço</label>
		<input type="text" name="endereco">
		<input type="submit">
	</form>
</body>
</html>