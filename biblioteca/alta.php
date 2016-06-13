<?php
include('conexion.inc');
if($_POST){
	$titulo=$_POST['titulo'];
	$autor=$_POST['autor'];
	$fecha=$_POST['fecha'];
	$categoria=$_POST['categoria'];
	$sql="select * from ejemplar where titulo='".$_POST['titulo']."'";
	$l=mysqli_query($link,$sql);
	if(mysqli_num_rows($l)!=0){
	echo 'repetido';
		
	}else{
		$insert=mysqli_query($link,"insert into ejemplar(id,titulo,autor,categoria,fecha) values('','".$titulo."','".$autor."','".$categoria."','".$fecha."')");
		$destinatario='nati6029@gmail.com';
		$asunto='hola';
		$cuerpo='jaja';
		mail($destinatario,$asunto,$cuerpo);
	}
	}

?>





<form action="" method="post">
<table >
  <tr>
    <td>Titulo</td>
    <td><input name="titulo" type="text" /></td>
  </tr>
  <tr>
    <td>Autor</td>
    <td><input name="autor" type="text" /></td>
  </tr>
    <tr>
    <td>Fecha</td>
    <td><input name="fecha" type="text" /></td>
  </tr>
    <tr>
    <td>Categoria</td>
    <td><select name='categoria'>
      <option value='policial'>policial</option>
      <option value='novela'>novela</option>
      <option value='ciencia'>ciencia</option>
      <option value='ficcion'>ficcion</option>
    </select></td>
  </tr>  
  <tr>
    
    <td><input value='guardar' type="submit" /></td>
  </tr>
</table>
</form>
<?php 
$num_por_pagina=1;

$libros=mysqli_query($link,'select * from ejemplar');
$total_registros=mysqli_num_rows($libros);
$pagina=isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : null;

if(!$pagina){
	$inicio=0;
	$pagina=1;
}else{
	$inicio=($pagina -1)*$num_por_pagina;
}
$total_pagina=ceil($total_registros/$num_por_pagina);
$libros=mysqli_query($link,"select * from ejemplar limit ".$inicio .",".$num_por_pagina);

?>


<form action="" method="post">
<table width="302" border="1">
  <tr>
    <td width="17">ID</td>
    <td width="75">Titulo</td>
    <td width="38">Autor</td>
    <td width="59">Fecha</td>
    <td width="79">Categoria</td>
  </tr>
  <?php while($a=mysqli_fetch_array($libros)){?>
  <tr>
    <td><?php echo $a['id']; ?></td>
    <td><?php echo $a['titulo']; ?></td>
	<td><?php echo $a['autor']; ?></td>
	<td><?php echo $a['fecha']; ?></td>
	<td><?php echo $a['categoria']; ?></td>
  </tr>
  <?php } ?>
  
</table>

</form>

<?php
if($total_pagina >1){
	for($i=1;$i<=$total_pagina;$i++){
		if($pagina==$i){
			echo $pagina;
		}else{
			echo "<a href='alta.php?pagina=".$i."'>".$i."</a>";
		}
	}
}

?>