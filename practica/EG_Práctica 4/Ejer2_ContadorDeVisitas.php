<?php
  if(isset($_COOKIE['contador']))
  { 
    setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60); 
    $mensaje = 'Número de visitas: ' . $_COOKIE['contador']; 
  } 
  else 
  { 
    setcookie('contador', 1, time() + 365 * 24 * 60 * 60); 
    $mensaje = 'Bienvenido a nuestra página web'; 
  } 
?> 
<html> 
	<head> 
		<title>Contador Visitas</title> 
	</head> 
	<body> 
		<!--Ejercicio N°2
		Crear una cookie llamada “contador” que lleve la cuenta en el lado cliente del número de veces que se ha accedido a la página contador.php. 
		Si es la primera vez que se accede, la página dará la bienvenida al usuario. Si ya se ha accedido anteriormente, la página hará uso de la cookie para mostrar
		el número de veces que se ha visitado dicha página.
		-->
		<p> 
			<?php echo $mensaje; ?> 
		</p> 
	</body> 
</html> 