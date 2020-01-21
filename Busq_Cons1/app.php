<?php 
$ppp=$_GET['x'];
$pap=json_decode($ppp);
var_dump($pap);
$opcion=$_POST['opcion'];
$fechaminima=$_POST['inicio'];
$fechamaxima=$_POST['final'];

$nombre=$ppp[0];
$sueldo=$ppp[1];
$apellido=$ppp[2];
$fecha_mod=$ppp[3];
$codigo=$ppp[4];
$dirigida=$ppp[5];
$creacion=$ppp[6];
$estado=$ppp[7];
$modificacion=$ppp[8];
$obervacion=$ppp[9];
$entrega=$ppp[10];

if ($nombre=="") {
	$nombre=0;
}
if ($sueldo=="") {
	$sueldo=0;
}
if ($apellido=="") {
	$apellido=0;
}
if ($fecha_mod=="") {
	$fecha_mod=0;
}
if ($codigo=="") {
	$codigo=0;
}
if ($dirigida=="") {
	$dirigida=0;
}
if ($creacion=="") {
	$creacion=0;
}
if ($estado=="") {
	$estado=0;
}
if ($modificacion=="") {
	$modificacion=0;
}
if ($obervacion=="") {
	$obervacion=0;
}
if ($entrega=="") {
	$entrega=0;
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<tr>
<td><?php echo $nombre ?></td>
<td><?php echo $sueldo ?></td>
<td><?php echo $apellido ?></td>
<td><?php echo $fecha_mod ?></td>
<td><?php echo $codigo ?></td>
<td><?php echo $dirigida ?></td>
<td><?php echo $creacion ?></td>
<td><?php echo $estado ?></td>
<td><?php echo $modificacion ?></td>
<td><?php echo $obervacion ?></td>
<td><?php echo $entrega ?></td>
 	</tr>

 		

 		 <table>
 		 	<?php
 		include('../crearConexionGECOMP.php');
 		if ($opcion=='12') {
 			$query=mssql_query("SELECT $nombre,$sueldo,$apellido,$fecha_mod,$codigo,$dirigida,$creacion,$estado,$modificacion,$obervacion,$entrega FROM CONSTANCIA_GENERADA "); 
 		while($fila=mssql_fetch_array($query)){


 			echo '<tr>
 		 		<td>'.$fila[0].'</td>
 		 		<td>'.$fila[1].'</td>
 		 		<td>'.$fila[2].'</td>
 		 		<td>'.$fila[3].'</td>
 		 		<td>'.$fila[4].'</td>
 		 		<td>'.$fila[5].'</td>
 		 		<td>'.$fila[6].'</td>
 		 		<td>'.$fila[7].'</td>
 		 		<td>'.$fila[8].'</td>
 		 		<td>'.$fila[9].'</td>
 		 		<td>'.$fila[10].'</td>

 		 	</tr>';
 		
 		}
 		}else{
 			$query=mssql_query("SELECT $nombre,$sueldo,$apellido,$fecha_mod,$codigo,$dirigida,$creacion,$estado,$modificacion,$obervacion,$entrega FROM CONSTANCIA_GENERADA WHERE Fecha_Creacion between '$fechaminima' and '$fechamaxima' AND Tipo_Constancia='$opcion'"); 
 		while($fila=mssql_fetch_array($query)){


 			echo '<tr>
 		 		<td>'.$fila[0].'</td>
 		 		<td>'.$fila[1].'</td>
 		 		<td>'.$fila[2].'</td>
 		 		<td>'.$fila[3].'</td>
 		 		<td>'.$fila[4].'</td>
 		 		<td>'.$fila[5].'</td>
 		 		<td>'.$fila[6].'</td>
 		 		<td>'.$fila[7].'</td>
 		 		<td>'.$fila[8].'</td>
 		 		<td>'.$fila[9].'</td>
 		 		<td>'.$fila[10].'</td>

 		 	</tr>';
 		
 		}
 		}
 		
 		

 		
 		 ?>
 		 	

 		 	
 		 </table>
 
 </body>
 </html>