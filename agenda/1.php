<?php
$x= -1;
$y= 9;
$suma= $x + $y;
print ("El valor de x es <i>$x<i>");
"<br />";
print ("El valor de y es <i>$y</i><br />");
print ("La suma es<b> <i>$suma</i></b><br />");
?>

<?php
//Dado un número entero positivo entre 1 y 12 (dicho número se debe ingresar en
//el código mismo), deberá mostrarse por pantalla el mes que corresponde. 
$num=11;
$numeros=array(
				'1'=>'enero',
				'2'=>'febrero',
				'3'=>'marzo',
				'4'=>'abril',
				'5'=>'mayo',
				'6'=>'junio',
				'7'=>'julio',
				'8'=>'agosto',
				'9'=>'septiembre',
				'10'=>'octubre',
				'11'=>'noviembre',
				'12'=>'diciembre'
				);
echo $numeros[$num];
?>