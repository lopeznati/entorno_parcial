<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>


<body>

<?php
include('conexion.php');
$nombre=$_POST['nombre'];

$sql="select * from buscador where nombre='".$nombre."'";
$resultado=mysqli_query($link, $sql) or die (mysqli_error($link));
$fila = mysqli_fetch_array($resultado);
if(mysqli_num_rows($resultado) == 0) {
echo ("empresa Inexistente...!!! <br>");
}
else{
?>
<FORM action="modificacion.php" method="POST" name="FormModi">
<table width="356">
<tr>
<td width="103"> Nombre: </td>
<td width="243"> <input type="text" name="nombre" value="<?php echo($fila['nombre']); ?>">
</td>
</tr>
<tr>
<td width="103">  web: </td>
<td width="243"> <input type="TEXT" name="web" size="20" maxlength="20"
value="<?php echo($fila['web']); ?>">
</td>
</tr>
<tr>
<td width="103"> telef: </td>
<td width="243"> <input type="TEXT" name="telef" size="20" maxlength="20"
value="<?php echo($fila['telef']); ?>">
</td>
</tr>
<tr>
<td width="103"> sector: </td>
<td width="243"> <input type="TEXT" name="sector" size="20" maxlength="40"
value="<?php echo($fila['sector']); ?>">
</td>
</tr>
<tr>
<td colspan="2" align="center"> <input type="SUBMIT" name="Submit" value="Modificar">
</td>
</tr>
</table>

<?php
}
// Liberar conjunto de resultados
mysqli_free_result($resultado);
// Cerrar la conexion
mysqli_close($link);
?>

