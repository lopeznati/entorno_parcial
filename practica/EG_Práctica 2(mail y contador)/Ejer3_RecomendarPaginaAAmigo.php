<?php 
	if (!isset($_POST['emailAmigo'])) 
	{ 
?>

<html>
	<head>
		<title></title>
	</head>
	<body>
		<!--Escribir un script para que un visitante recomiende el sitio a un amigo. -->
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
			<p>Nombre Visitante:</p>
			<p><input name="nombreVisitante" type="text" id="nombreVisitante" /></p>
			<p>E-mail Visante:</p>
			<p><input name="emailVisitante" type="text" id="emailVisitante" /></p>
			<p>Nombre de tu amigo/a:</p>
			<p><input name="nombreAmigo" type="text" id="nombreAmigo" /></p>
			<p>E-mail de tu amigo/a:</p>
			<p><input name="emailAmigo" type="text" id="emailAmigo" /></p>
			<p>Comentarios:</p>
			<p><textarea name="comentarios" cols="30" rows="6"></textarea></p>
			<p><input type="reset" value="borrar" />
			<input type="submit"  value="enviar"/></p>
		</form>
	</body>	
</html>
<?php 
	}
	else
	{
		$msg= "Hola ".$_POST['nombreAmigo'] ."!";
		$msg.= "\n". $_POST['nombreVisitante']." (". $_POST['emailVisitante'] .") nos ha pedido que te invitemos a visitar nuestra web,";
		$msg.= " y ha querido escribirte el siguiente comentario: \n".$_POST['comentarios'];
		$email = $_POST['emailAmigo'];
		$subject = "Recomendacion enviada desde Dominio.com por: ".$_POST['nombreVisitante'];
		mail($email, $subject, $msg, "FROM: admin@wampserver.invalid\n");
?>
	<p>Mensaje enviado.</p>
	<p>Su recomendaci&oacute;n se ha enviado a la siguiente direcci&oacute;n <strong><?php echo   $email; ?></strong> correctamente.</p>
	
<?php
	}
?>
