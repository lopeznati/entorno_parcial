<?php
	session_start();
	
	$carro = $_SESSION['carro'];
?>

<html>
	<head>
		<title>Productos agregados al carrito</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" href="carritoCompras.css"/>
	</head>
	<body>
		<h1>Carrito de Compras</h1>
		<?php
			if($carro)
			{
		?>		
				<table class="tablaCarritoDeCompras">
					<thead>
						<td width="105">Identificación</td>
						<td width="207">Producto</td>
						<td width="207">Precio</td>
						<td colspan="2">Cantidad de Unidades</td>
						<td width="100">Borrar</td>
						<td width="159">Actualizar</td>
					</thead>
				<?php
					$contador = 0;
					$suma = 0;
									
					foreach($carro as $k => $v)
					{						
						$subTotal = $v['cantidad'] * $v['precioProducto'];
						$suma = $suma + $subTotal;
						$contador++;
				?>
						<form name="a<?php echo $v['identificador'] ?>" method="post" action="Ejer7_AgregarCarrito.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>">
							<tbody>
								<tr class="prod">
									<td><?php echo $v['idProducto'];?></td>
									<td align="left"><?php echo $v['detalleProducto'];?></td>
									<td><?php echo $v['precioProducto'];?></td>
									<td width="43" align="center"><?php echo $v['cantidad'];?></td>
									<td width="136" align="center">
										<input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad'] ?>" size="10">
										<input name="id" type="hidden" id="id" value="<?php echo $v['idProducto'] ?>"> 
									</td>
									<td align="center">
										<a href="Ejer7_BorrarCarrito.php?<?php echo SID ?>&id=<?php echo $v['idProducto'] ?>"><img src="eliminarDelCarrito.gif" width="20" height="20"></a>
									</td>
									<td align="center">
										<input name="imageField" type="image" src="actualizar.gif" width="20" height="20"/>
									</td>
								</tr>
							</tbody>
						</form>
						<?php 
					}
						?>
					<tfoot class="prod">
						<!--
						<tr>
							<td colspan="7"><b>Total de Artículos: </b><?php echo count($carro); ?></td>
						</tr>-->
						<tr>
							<td colspan="7"><b>Total a abonar: </b>$<?php echo number_format($suma,2); ?></td>
						</tr>
					</tfoot>
				</table>
				<div align="center"><span class="prod"><b>Continuar la selección de productos</b></span>
					<a href="Ejer7_Catalogo.php?<?php echo SID;?>"><img src="continuar.gif" width="16" height="15" border="0" align="absmiddle"  title="Elegir mas productos para agregar al carrito"></a>&nbsp;
					<a href="Ejer7_RegistrarPago.php?<?php echo SID;?>&costo=<?php echo $suma; ?>"><img src="finalizarCompra.gif" width="135" height="18" border="0" align="absmiddle"></a>
				</div>
			<?php 
			}
			else
			{ 
			?>
				<p align="center">
					<span class="prod"><b>No hay productos seleccionados</b></span> <a href="Ejer7_Catalogo.php?<?php echo SID;?>"><img src="continuar.gif" width="13" height="13" border="0" title="Elegir productos para agregar al carrito"></a>
				<?php 
			}
				?>
				</p>
	</body>
</html>