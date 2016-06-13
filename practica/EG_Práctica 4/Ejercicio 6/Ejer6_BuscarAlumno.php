<?php
	session_start();
	
	$link = mysqli_connect("localhost", "root", "") or die ("Problemas en la conexión" . mysqli_error());
	
	mysqli_select_db($link, "base2");
	
	$mailUsuario=$_REQUEST['mailUsuario'];

	$consulta = mysqli_query($link,"select nya from alumnos where mail = '$mailUsuario'");
	
	if (mysqli_num_rows($consulta) >= 1)
	{
		$alumno = mysqli_fetch_array($consulta);
		$_SESSION['alumno']= $alumno['nya'];
		
		echo "La variable de sesión para el alumno " . $_SESSION['alumno'] . " ha sido creada con éxito </br>";
	}
	else 
	{
		echo "El alumno con mail " . $mailUsuario . " no existe " . "</br>";
		unset($_SESSION['alumno']);
	}
	echo ("<a href ='Ejer6_FormIngresoEmail.html'>Regresar al formulario</a><br>");
	echo ("<a href ='Ejer6_VerificarCookie.php'>Verificar si existe cookie asociada a dicho alumno</a>");

?>