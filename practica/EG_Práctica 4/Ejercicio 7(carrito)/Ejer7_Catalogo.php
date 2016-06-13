<?php
	ob_start("ob_gzhandler");
	
	session_start();
	
	$link = mysqli_connect("localhost","root","");
	mysqli_select_db($link,"compras");
	
	if(isset($_SESSION['carro']))
	{
		$carro = $_SESSION['carro'];
	}
	else 
	{
		$carro = false;
	}
		
	$resul = mysqli_query($link, "select * from catalogo order by detalleProducto asc");
?>

<html>
	<head>
		<title>Catalogo Productos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" href="carritoCompras.css"/>
	</head>
	<body>
		<table class="tablaCatalogoProductos">
			<caption><h1>Catalogo de Productos</h1></caption>
			<thead>
				<td>Producto</td>
				<td>Precio</td>
				<td><a href="Ejer7_VerCarrito.php?<?php echo SID ?>" title="Ver el contenido del carrito"><img src="verCarrito2.gif"></a></td>
			</thead>
		<?php
	
		/*Mostramos todos nuestros artículos, viendo si han sido agregados o no a nuestro carro de compra*/
	
			while($row = mysqli_fetch_assoc($resul))
			{
		?>
			<tbody>
				<tr class="prod">
					<td><?php echo $row['detalleProducto'] ?></td>
					<td align="center"><?php echo $row['precioProducto'] ?></td>
					<td align="center">
						<?php 
							if(!$carro || !isset($carro[md5($row['idProducto'])]['identificador']) || $carro[md5($row['idProducto'])]['identificador']!=md5($row['idProducto']))
							{
						?>
								<a href="Ejer7_AgregarCarrito.php?<?php echo SID ?>&id=<?php echo $row['idProducto']; ?>"><img src="productoNoAgregado.gif" border="0" title="Agregar al Carrito"></a><?
							else
							{
						?>
								<a href="Ejer7_BorrarCarrito.php?<?php echo SID ?>&id=<?php echo $row['idProducto']; ?>"><img src="productoAgregado.gif" border="0" title="Quitar del Carrito"></a><?php }?>
					</td>	
				</tr>
			</tbody>
				<?php 
			} 
				?>
		</table>
	</body>
</html>

<?php
	ob_end_flush();
?>