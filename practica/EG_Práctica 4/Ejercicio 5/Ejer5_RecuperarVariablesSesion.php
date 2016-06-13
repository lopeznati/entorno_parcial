<?php
	session_start();
	
	echo "<b>Valor de la variable de sesión creada para el nombre de usuario:</b> " . $_SESSION['nombreUsuario']  . "<br>";
	echo "<b>Valor de la variable de sesión creada para la contraseña del usuario:</b> " . $_SESSION['contrasenia'] .  "<br>";
	echo("<a href='Ejer5_Login.html'>Volver al formulario</a>");	
	
?>