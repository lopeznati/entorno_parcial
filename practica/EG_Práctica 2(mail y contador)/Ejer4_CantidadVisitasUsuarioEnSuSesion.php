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
		<title>Páginas visitadas por usuario en su sesión<</title> 
	</head> 
	<body> 
		<?php 
			echo "Desde que entraste has visto " . $_SESSION["contador"] . " páginas";
		?> 
		<br> 
		<br> 
		<a href="Ejer4_CantidadVisitasActualizada.php">Siguiente página</a> 
	</body> 
</html>