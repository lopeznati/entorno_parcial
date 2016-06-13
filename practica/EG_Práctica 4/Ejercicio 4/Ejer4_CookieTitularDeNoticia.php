<?php

	if (isset($_POST['preferenciaNoticia']))
	{
		if ($_POST['preferenciaNoticia'] == "politica")
		{
			$preferenciaNoticia = "politica";
			setcookie('preferenciaNoticia', $preferenciaNoticia, time () + (86400 * 30));

		}
		else if ($_POST['preferenciaNoticia'] == "economica")
		{
			$preferenciaNoticia = "economica";
			setcookie('preferenciaNoticia', $preferenciaNoticia, time () + (86400 * 30));
		}
		else if ($_POST['preferenciaNoticia'] == "deportiva")
		{
			$preferenciaNoticia = "deportiva";
			setcookie('preferenciaNoticia', $preferenciaNoticia, time () + (86400 * 30));
		}
	echo "Se ha guardado como preferencia a " . $_COOKIE['preferenciaNoticia'] . "</br>";
	}
	else 
	{	
		if (isset($_COOKIE['preferenciaNoticia']))
		{
			echo "La noticia de preferencia del usuario " . $_COOKIE['preferenciaNoticia'] . "<br>";
		}
		else
		{
			echo "No existe ninguna cookie creada. <br>";
		}
	}
	
	echo("<a href='Ejer4_PreferenciasDeNoticias.html'>Volver al formulario</a><br>");
	echo("<a href='Ejer4_BorrarCookie.php'>Borrar cookie</a>");
	
?>