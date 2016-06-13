<?php
	
	$link = mysqli_connect("localhost","root","") or die ("Problemas en la conexión" .mysqli_error());
	mysqli_select_db($link,"prueba");

?>