
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

<?php
include("conexion.php");
$sql="select * from tabbd";
$resultado=mysqli_query($link,$sql);

$total_registro=mysqli_num_rows($resultado);

$cant_por_pag=1;
$pagina=isset($_GET['pagina'])? $_GET['pagina'] : null;

if(!$pagina){
$inicio=0;
$pagina=1;
}else{
	$inicio=($pagina -1) *$cant_por_pag;
}
$total_paginas=ceil($total_registro/$cant_por_pag);
$sql="select * from tabbd limit ".$inicio.",".$cant_por_pag;
$resultado=mysqli_query($link,$sql);
$total_registros=mysqli_num_rows($resultado);
?>

<table border="1">
	<tr>
		<td>Usuario</td>
		<td>DNI</td>
		<td>Email</td>
	</tr>
	<?php while($fila=mysqli_fetch_array($resultado)){ ?>
	<tr>
		<td><?=$fila['identificador']?></td>
		<td><?=$fila['nombres']?></td>
		<td><?=$fila['apellido']?></td>
	</tr>
	<?php }?>
</table>

<?php 


if($total_paginas>1){
for($i=1;$i<=$total_paginas;$i++){
	if($pagina==$i)
		echo $pagina."";
	else{
		echo "<a href='listado.php?pagina=".$i."'>".$i."</a>";
	}
}
}
?>

</body>
</html>
