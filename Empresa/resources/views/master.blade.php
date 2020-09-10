<!-- View Master - Base para outras View construidas por extenção desta. -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('titulo')</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

	<style type="text/css">
		.page-item {color: green;}
		.active {color: green;}
	</style>

</head>
<body>
	<!-- As views filhas incluem conteúdo aqui e no outro Arrobayield acima -->
	@yield('corpo')
</body>
</html>