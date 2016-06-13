<?php 
	include ('conexion.inc');
	
	if(!empty($_POST)){
		$tipo=trim($_POST['tipo']);
		$direccion=trim($_POST['direccion']);
		$zona=trim($_POST['zona']);
		$dormitorios=trim($_POST['num']);
		
		$vivienda=mysqli_query($link,"select * from vivienda where direccion='".$direccion."'");
		if(mysqli_num_rows($vivienda)!=0) {
			echo 'direccion repetida';
		}else{
			
			$resultado=mysqli_query($link,"insert into vivienda(id,tipo,zona,direccion,numero_dormitorio) 
			values('','".$tipo."','".$zona."','".$direccion."','".$dormitorios."')");
		}
	}
?>

<form method='post' action=''>
<table>
	<tr>
		<td>Tipo de vivienda</td>
		<td>
			<select name='tipo'>
				<option value='piso'>Piso </option>
				<option value='depto'>Depto </option>
				<option value='chalet'>chalet </option>
				<option value='casa'>casa </option>
			</select>
		</td>
		
	</tr><br>
	
	<tr>
		<td>Zona</td>
		<td>
			<select name='zona'>
				<option value='centro'>Centro </option>
				<option value='sur'>Sur </option>
				<option value='oeste'>Oeste </option>
			</select>
		</td>
		
	</tr>
	
		<tr>
		<td>Direccion</td>
		<td> <input type='text' name='direccion'></td>
		
		</tr>
		
	<tr>
		<td>Numero de dormitorios</td>
		<td>
			<select name='num'>
				<option value='1'>1 </option>
				<option value='2'>2 </option>
				<option value='3'>3</option>
				<option value='4'>4 </option>
				<option value='5'>5 </option>
			</select>
		</td>
		
	</tr><br>
	
	<tr>
		
		<td> <input type='submit' value='guardar'></td>
		
	</tr>
	
</table>

</form>


<?php 

$viviendas=mysqli_query($link,"select * from vivienda");
$total_registro=mysqli_num_rows($viviendas);
$num_por_pagina=2;

$pagina=isset($_REQUEST['pagina']) ? $_REQUEST['pagina']: null;
if(!$pagina){
	$inicio=0;
	$pagina=1;
}else{
	$inicio=($pagina-1)*$num_por_pagina;
}
$total_pagina=ceil($total_registro/$num_por_pagina);
$sql="select * from vivienda limit " . $inicio .",". $num_por_pagina;
$viviendas=mysqli_query($link,$sql);



?>

<table>
	<tr>
		<td>ID</td>
		<td>Tipo</td>
		<td>Zona</td>
		<td>Direccion</td>
		<td>dormitorios</td>
		<td>Acciones</td>
	</tr>
	
	<?php while($a=mysqli_fetch_array($viviendas)){ ?>
		<tr>
			<td><?php echo $a['id'] ?></td>
			<td><?php echo $a['tipo'] ?></td>
			<td><?php echo $a['zona'] ?></td>
			<td><?php echo $a['direccion'] ?></td>
			<td><?php echo $a['numero_dormitorio'] ?></td>
			<td><a href='modiicar.php?id= <?php echo $a['id'] ?>'>Modificar</a>
			
	</tr>
	<?php } ?>
</table>

<?php 

if($total_pagina >1){
	for($i=1;$i<=$total_pagina;$i++){
		if($pagina==$i){
			echo $pagina;
		}else{
			echo "<a href='form.php?pagina=".$i."'>".$i."</a>";
		}
	}
}

?>
