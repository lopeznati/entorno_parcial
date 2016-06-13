<html>
	<head>
		<title></title>
	</head>
	<body>	
		<?php
			$fecha=date("d-m-Y");
			$hora= date("H :i:s");
			$destino="mailencastellarin@gmail.com"; 
			$asunto="Comentario";
			$desde='From:' .$_POST['email'];
			$comentario= "\nNombre: $_POST[nombre]\nEmail: $_POST[email]\nConsulta: $_POST[texto]\nEnviado: $fecha a las $hora\n\n";
			mail($destino,$asunto,$comentario,$desde);
			echo "Su consulta ha sido enviada, en breve recibirá nuestra respuesta.";
		?>
	</body>
</html>