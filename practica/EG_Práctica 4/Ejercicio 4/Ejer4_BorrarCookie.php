<?php
	
	if (isset($_COOKIE['preferenciaNoticia']))
	{
		unset ($_COOKIE['preferenciaNoticia']);
		setcookie ('preferenciaNoticia', '' , time () - 3600);
		echo "Cookie borrada con éxito <br>";
	}
	else
	{
		echo "No existe ninguna cookie creada que se pueda borrar. <br>";
	}
	
	echo("<a href='Ejer4_PreferenciasDeNoticias.html'>Volver al formulario</a><br>");
?>