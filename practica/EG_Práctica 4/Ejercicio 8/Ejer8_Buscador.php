<html>
	<head>
		<title>Buscador de canciones</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<?php
			include('Ejer8_Conexion.inc');
			$palabra = $_POST['palabra'];
			if($palabra)
			{
				$consulta = mysqli_query($link,"select * from buscador where canciones LIKE '%".$palabra."%'") or die (mysqli_error($link));
				if(mysqli_num_rows($consulta) == "0") 
				{
					echo "No hay resultados respecto a la palabra que busca.";
				} 
				else 
				{
					echo "<center><strong>RESULTADOS DE BUSQUEDA</strong></center><br>";
					while($canc = mysqli_fetch_array($consulta)) 
					{
						?>
						<td>
							<?php echo ($canc ['canciones']) . "<br>";?>
						</td>
						</tr>
						<tr>
							<td colspan="5">
						<?php 
					} 
				}
			}
			else
			{
				echo "<form name='formBuscador' method='post' action=''><input name='palabra' type='text' id='palabra'><input type='submit' name='Submit' value='buscar'></form>";
			}
		?>
	</body>
</html>