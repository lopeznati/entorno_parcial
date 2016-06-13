<?php
	session_start();

	if (isset($_SESSION['alumno']))
	{
		echo "¡¡¡¡Bienvenido!!!!";
	}
	else 
	{
		echo "El usuario no puede visitar la página";
	}
	echo("<br><a href='Ejer6_FormIngresoEmail.html'>Volver al formulario</a>");

?>