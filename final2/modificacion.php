
<head>
<title>Modificacion</title>
</head>
<body>
<?php
include ("conexion.php");
//Captura datos desde el Form anterior
$nombre = $_POST['nombre'];
$web = $_POST['web'];
$telef = $_POST['telef'];
$sector = $_POST['sector'];
//Arma la instrucción SQL y luego la ejecuta
$vSql = "UPDATE buscador set nombre='".$nombre."', web='".$web."', telef='".$telef."', sector='".$sector."' where nombre='".$nombre."'";
mysqli_query($link,$vSql) or die (mysqli_error($link));
echo("El Usuario fue Modificado<br>");
echo("<A href= 'Menu.html'>Volver al Menu del ABM</A>");
// Cerrar la conexion
mysqli_close($link);
?></body>
</body>
</html>