<!DOCTYPE html>
<html>
<head>
	<title>Criar</title>
</head>
<body>
	<h3>Novo Funcionário</h3>
	<form action="/funcionario" method="post">
		@csrf
		<dl>
			<dt>Nome</dt>
			<dd>
				<input type="text" name="nome" />	
			</dd>
			<dt>Endereco</dt>
			<dd>
				<input type="text" name="endereco" />
			</dd>
			<input type="submit" value="Criar"/>
		</dl>
	</form>
</body>
</html>