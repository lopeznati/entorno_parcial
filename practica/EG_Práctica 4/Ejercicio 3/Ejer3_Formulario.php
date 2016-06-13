<html>
	<head>
		<title>Ingresar Usuario</title>
	</head>
	<body>
	<!--Ejercicio N°3
		Crear un formulario que solicite la carga del nombre de usuario. 
		Cuando se presione un botón crear una cookie para dicho usuario. 
		Luego cada vez que ingrese al formulario mostrar el último nombre de usuario ingresado.
	-->
		<form action = "Ejer3_CookieUsuario.php" method="post">
			<label for="nombreUsuario">Usuario:</label>
			<input type="text" name="nombreUsuario"/>
			<input type="submit" name="submit"value="Crear cookie"/>
		</form>
		
		<?php 
		if (isset($_COOKIE['nombreUsuario']))
		{
			echo "Último usuario que ingresó al sitio fue " . $_COOKIE['nombreUsuario'];
		}	
		?>
	</body>
</html>