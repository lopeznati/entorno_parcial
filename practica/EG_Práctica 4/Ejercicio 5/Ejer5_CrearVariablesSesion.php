<?php

	session_start();
	
	if (isset( $_POST['nombreUsuario']))
	{
		$_SESSION['nombreUsuario'] = $_POST['nombreUsuario'];
	}
	
	if (isset($_POST['contrasenia']))
	{
		$_SESSION['contrasenia'] = $_POST['contrasenia'];
	}

	echo("<a href='Ejer5_Login.html'>Volver al formulario</a><br>");	
	echo("<a href='Ejer5_RecuperarVariablesSesion.php'>Recuperar valores variables de sesión</a>");	
?>