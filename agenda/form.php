<?php 
include('conexion.inc');

$amigos=mysql_query("select * from amigos");

if(!empty($_POST)){
	$nombre=trim($_POST['nombre']);
	$edad=trim($_POST['edad']);
	$fecha=trim($_POST['fecha']);
	$telefono=trim($_POST['telefono']);
	
	$sql=mysql_query('select * from amigos where telefono="'.$telefono.'"');
	if(mysql_num_rows($sql)!=0){
		echo "ese numero ya fue ingresado";
	}else{
		$alta=mysql_query("insert into amigos(id,nombre,edad,fecha,telefono) values('', '".$nombre."','".$edad."','".$fecha."','".$telefono."')");
		header('location: form.php');
	}
}

?>

<form action='' method='post'>
	<table>
		<tr>
			<td>Nombre</td>
			<td><input type='test' name='nombre'></td></br>
		</tr>
		<tr>
			<td>Edad</td>
			<td><input type='test' name='edad'></td></br>
		</tr>
		<tr>
			<td>Fecha de cumpleaños</td>
			<td><input type='test' name='fecha'></td></br>
		</tr>
		<tr>
			<td>telefono</td>
			<td><input type='test' name='telefono'></td></br>
		</tr>
		<tr>
			
			<td><input type='submit' value='guardar'></td>
		</tr>
	</table>
</form>




<?php 

//paginacionn
	$cant_por_pag=4;
	$pagina=isset($_GET['pagina'])? $_GET['pagina']: null;
	if(!$pagina){
		$inicio=0;
		$pagina=1;
		
		
	}
	else{
		$inicio=($pagina -1) * $cant_por_pag;
		
	}
	$amigos=mysql_query("select * from amigos");
	$total_registros=mysql_num_rows($amigos);
	$total_paginas=ceil($total_registros / $cant_por_pag);
	$amigos=mysql_query("select * from amigos"." limit ".$inicio.",".$cant_por_pag);
	$total_registros=mysql_num_rows($amigos);
	
	if($total_paginas > 1){
		for($i=1;$i<=$total_paginas;$i++){
			if($pagina==$i){
				echo $pagina."";
				
			}else echo "<a href='form.php?pagina=".$i."'>".$i."</a>";
		}
	}
	
?>
<p> &nbsp;</p>


<table border='1'>
	<tr>
			<td>Id</td>
			<td>Nombre</td>
			<td>Edad</td>
			<td>Fecha</td>
			<td>Telefono</td>
	</tr>
	<?php while($a=mysql_fetch_array($amigos)){ ?>
	<tr>
			<td><?php echo $a['id'];?></td>
			<td><?php echo $a['nombre'];?></td>
			<td><?php echo $a['edad'];?></td>
			<td><?php echo $a['fecha'];?></td>
			<td><?php echo $a['telefono'];?></td>
	</tr>
	<?php }?>

</table>