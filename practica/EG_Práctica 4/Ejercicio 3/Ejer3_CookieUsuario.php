<?php
	if (isset($_POST['nombreUsuario']))
	{
		$usuario = $_POST['nombreUsuario'];
		setcookie('nombreUsuario', $usuario, time() + 60*60*24*90);
	}
	else if (isset($_COOKIE['nombreUsuario']))
	{
		echo "Ya se tiene una cookie creada con nombre de usuario " .  $_COOKIE['nombreUsuario'] . "<br>";
	}
	echo("<a href='Ejer3_Formulario.php'>Volver al formulario</a>");

?>