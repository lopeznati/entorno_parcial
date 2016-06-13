<?php
	session_start();
	
	$carro=$_SESSION['carro'];
	
	/* $productos1 es la variable que usaremos para mostrar los productos en esta página (separados por '+')*/
	
	$productos1='';
	
	/* $productos2 es la que usaremos para enviar a Paypal (separados por ',')*/

	$productos2='';
	
	foreach($carro as $k => $v)
	{
		$unidad = $v['cantidad']>1?" unidades de ":" unidad de ";
		$productos1.= $v['cantidad'].$unidad.$v['detalleProducto']."+";
		$productos2.= $v['cantidad'].$unidad.$v['detalleProducto'].", ";
	}
	//Eliminamos el último '+':
	
	$productos1 = substr($productos1,0,(strlen($productos1)-1));
	
	//Eliminamos la última coma y el espacio que sigue a la misma:
	
	$productos2=substr($productos2,0,(strlen($productos2)-2));
?>

<html>
	<head>
		<title>Finalizar Compra</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" href="carritoCompras.css"/>
	</head>
	<body>
	
	<!-- Creamos el formulario para enviar a Paypal -->
	
		<form action="https://www.paypal.com/cgi-bin/webscr" name="f1" id="f1" method="post">
			<fieldset>
				<legend class="prod"><strong>Finalizar Compra</strong> <a href="#" onClick="javascript:window.open('https://www.paypal.com/cgi-bin/webscr?cmd=xpt/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, width=400, height=350');"><img src="https://www.paypal.com/en_US/i/bnr/horizontal_solution_PP.gif" alt="Solution Graphics" border="0" align="absmiddle"></a></legend>
				<input type="hidden" name="shipping" value="0">
				<input type="hidden" name="cbt" value="Presione aquí para volver a www.nuestrositio.com >>">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="rm" value="2">
				<input type="hidden" name="bn" value="nombre de la empresa vendedora">
				<input type="hidden" name="business" value="maildelvendedor@dominio.com">
				<input type="hidden" name="item_name" value="<?php echo $productos2; ?>">
				<input type="hidden" name="item_number" value="Nombre del comprador">
				<input type="hidden" name="amount" value="<?php echo number_format($_GET['costo'],2) ?>">
				<input type="hidden" name="custom" value="<?php echo $_GET['costo'] ?>">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="image_url" value="">
				<input type="hidden" name="return" value="http://www.nuestrodominio.com/ipn_success.php">
				<input type="hidden" name="cancel_return" value="http://www.nuestrodominio.com/ipn_error.php">
				<input type="hidden" name="no_shipping" value="0">
				<input type="hidden" name="no_note" value="0">
			
				<!-- Mostramos el detalle de la compra -->
				<table width="50%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#EABB5D" style=" border-color:#000000; border-style:solid;border-width:1px;">
					<tr>
						<td align="left" valign="top"><span class="prod"><strong>Detalle de los Productos Seleccionados</strong>:</span><br>
							<span class="texto1negro"> </span><span class="prod"><strong>Productos:</strong> <?php echo $productos1; ?><br>
							<strong>Precio Total:</strong> $<?php echo number_format($_GET['costo'],2) ?> </span></td>
					</tr>
				</table>
					<input type="submit" name="Submit" value="Enviar">
			</fieldset>
		</form>
	</body>
</html>