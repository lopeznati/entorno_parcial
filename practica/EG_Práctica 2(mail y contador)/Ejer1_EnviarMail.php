<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			$destinatario = "mcastellarin@gmail.com";
			$asunto = "Probando envio mail PHP";
			$cuerpo = "
						<html>
							<head>
								<title>Enviar email</title>
							</head>
							<body>
								<p></p><h1>Hola</h1></p>
							</body>
						</html>";
			mail($destinatario,$asunto,$cuerpo);
		?>
	</body>
</html>
