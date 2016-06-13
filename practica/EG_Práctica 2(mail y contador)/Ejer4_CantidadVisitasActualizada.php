<?php
	session_start();
	
	if (!isset($_SESSION["contador"]))
	{
		$_SESSION["contador"] = 1;
	}
	else
	{
	$_SESSION["contador"]++;
	}
	?>
	
<html>
	<head>
		<title>Otra página</title>
	</head>
	<body>

		<?php
			echo "Has visitado " . $_SESSION["contador"] . " páginas, contando actualizaciones de paginas";
		?>
		<br>
		<br>
		<a href="Ejer4_CantidadVisitasUsuarioEnSuSesion.php">Volver a página anterior</a>
	</body> 
<html>		
<html>
