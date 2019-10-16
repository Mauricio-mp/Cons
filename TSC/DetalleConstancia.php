<?php 
$CodigoEmpleado=$_GET['CodigoEmpleado'];
$Status=$_GET['Status'];


if ($Status=="T") {
	 echo "<script>";
    echo "alert('EL EMPLEADO SELECCIONADO ESTA SUSPENDIDO');";
    echo "window.location = 'index.php';";
    echo "</script>";

}

if ($Status=="I") {
	//header('location:index.php');
	 echo "<script>";
    echo "alert('EL EMPLEADO SELECCIONADO ESTA INACTIVO');";
    echo "window.location = 'index.php';";
    echo "</script>";
}



?>

<?php 
 session_start();
ob_start();

include('ConversionSueldo.php');
include('ConversionFecha.php');
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
            
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 

            
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/Estilos.css">


</head>


	<!-- SideBar -->
<section id="loadgif">
  <?php include('../Menu1.php'); ?>


</section>

<?php 
//$numero=$_GET['x'];
//echo $numero;
$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fechaActual=fecha1($dia,$mes,$anio); 

 $Fechaactual=date("m-Y");
 include('../crearConexionGECOMP.php');

 $validarCons=mssql_query("SELECT * FROM CONSTANCIA_GENERADA WHERE Codigo_Empleado='$CodigoEmpleado' and convert(varchar(25),Fecha_Creacion , 105) like '%$Fechaactual%' and Tipo_Constancia='10'");
  $optenerCantidad=mssql_num_rows($validarCons);


   if ($optenerCantidad>=2) {
     echo "<script>alert('A ESTE EMPLEADO SE LE HAN GENERADO ESTA CONSTANCIA ".$optenerCantidad." VECES EN ESTE MES');</script>";
   }



include('../crearConexionVam.php'); 
$mostrarDatos=mssql_query("SELECT * FROM prempy  WHERE cempno='$CodigoEmpleado'");
if ($row=mssql_fetch_array($mostrarDatos)) {
	$DESC=$row['cfedid'];
	$codigoPuesto=$row['cjobtitle'];
	$codigoAsignado=$row['cdeptno'];
	$opnetersueldo=$row['nmonthpay'];
	$opnetersueldo=number_format($opnetersueldo,2);
  $Nombre=$row['cfname'];
  $Apellido=$row['clname'];
  $NombreCompleto=trim($Nombre)."\t".trim($Apellido);
  $identidad=$row['cfedid'].",";
	//echo "<script>alert('".$DESC."');</script>";

   $dia1 = date("d", strtotime($row['dhire']));
   $mes1 = date("m", strtotime($row['dhire']));
   $anio1 = date("Y", strtotime($row['dhire']));

   $dia2 = date("d", strtotime($row['dcntrct']));
   $mes2 = date("m", strtotime($row['dcntrct']));
   $anio2 = date("Y", strtotime($row['dcntrct']));
 
   $fechaContrato=fecha($dia1,$mes1,$anio1); 
   $fechaAcuerdo=fecha($dia2,$mes2,$anio2); 

  if ($row['dhire']==$row['dcntrct']) {
  	$msg="ha laborado por acuerdo en esta institucion a partir del ".$fechaContrato.", ";
  }
  if ($row['dhire']<$row['dcntrct']) {
  	$msg="ha laborado por contrato en esta institucion a partir de ".$fechaContrato." y por acuerdo desde el ".$fechaAcuerdo.",";
  }
$var=convertir($opnetersueldo);


	
}
include('../cerrarConexionVam.php');
include('../crearConexionGECOMP.php');




 ?>
<?php 
include('../crearConexionVam.php'); 
$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
	$ejecutar['cDesc'];
  $cargo=$ejecutar['cDesc'];
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
	$asignado['cdeptname'];
  $Asignadoa=$asignado['cdeptname'];
}
include('../cerrarConexionVam.php'); 



//****************** CONSULTAS DE ACUERDOS *****************////////

include('../crearConexionGECOMP.php');
$consultar=mssql_query("SELECT * FROM Carta_Constancia WHERE Estado='1'");
if ($consultaAcuerdo=mssql_fetch_array($consultar)) {
	
$consultaAcuerdo['Nombre_Acuerdo'];
$nuevafrecha= date("d/m/Y",strtotime($consultaAcuerdo['Fecha_Inicial']));
$Fecha_Efectivo= date("d/m/Y",strtotime($consultaAcuerdo['Fecha_Efectivo']));


}
//****************** CONSULTAS DE Base constancis *****************////////


$consultarfondos=mssql_query("SELECT * FROM Base_Constancia WHERE Base_Empledo='$CodigoEmpleado' and Estado='1'");
if ($fondos=mssql_fetch_array($consultarfondos)) {
	$fondos_Chaja_Chica=$fondos['Caja_Chica'];
 $formato_Chaja_Chica=number_format($fondos['Caja_Chica'],2);

 	$fondos_Plus_Sueldo=$fondos['Plus'];
 $formato_Plus_Sueldo=number_format($fondos['Plus'],2);

 	$Zonaje_Plus=$fondos['Zonaje_Plus'];
 $Formato_Zonaje_Plus=number_format($fondos['Zonaje_Plus'],2);

 $Zonaje=$fondos['Zonaje'];
 $Formato_Zonaje=number_format($fondos['Zonaje'],2);

 $Fondo_Reint=$fondos['Fondo_Reint'];
 $formato_Fondo_Reint=number_format($fondos['Fondo_Reint'],2);

 $fondos_Fondo_Combus=$fondos['Fondo_Combus'];
 $formato_Fondo_Combus=number_format($fondos['Fondo_Combus'],2);

}

 ?>
<div class="container">
 



 <div class="center">
<div class="full-box text-center" style="padding: 30px 10px;">
      <img src="../img/9.png" alt="user-picture" class="logo">

      <h4 class="centrartitulo">CONSTANCIAS</h4>
</div>
<p style="font-family: times; font-size: 22px;  margin-left: 3em;  margin-right: 3em; text-align: justify; text-transform: uppercase;">El(a) suscrito subjefe del departamento de personal, hace constar que <?php echo "<strong>".utf8_encode($NombreCompleto)."</strong>";  ?>, con numero de identidad <?php echo $identidad;?> <?php echo $msg;?> actualmente se desempeña como <?php echo $ejecutar['cDesc']; ?> asignado a: <?php echo utf8_encode($asignado['cdeptname']).","; ?> segun acuerdo <?php echo $consultaAcuerdo['Nombre_Acuerdo']; ?> que a partir del <?php echo $nuevafrecha;?> se otorge un aumento salarial por Costo de vida, siendo efectivo a partir del <?php echo  $Fecha_Efectivo;?> con un sueldo mensual de: <?php echo $var; echo "\t("."L.".$opnetersueldo.")";?></p>

<div style="margin-left:150px">
	<table width="80%">
		<thead>
			<tr>
				<td><td>
					<td><td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Maneja fondos de caja Chica</td>
				<td><?php  echo $formato_Chaja_Chica; ?></td>
			</tr>
			<tr>
					<td>Recibe pago plus</td>
				<td><?php echo $formato_Plus_Sueldo; ?></td>


			</tr>
			<tr>
				<td>Maneja Zonaje Plus</td>
				<td><?php echo $Formato_Zonaje_Plus; ?></td>


			</tr>
			<tr>
				<td>Zonaje </td>
				<td><?php echo $Formato_Zonaje; ?></td>


			</tr>
			<tr>
				<td>Maneja Fondos Rotatorios</td>
				<td><?php echo $formato_Fondo_Reint; ?></td>


			</tr>
			<tr>
				<td>Maneja fondos de combustibles</td>
				<td><?php echo $formato_Fondo_Combus; ?></td>


			</tr>

		</tbody>
	</table>
</div>




<p class="parrafo">para los fines que al interesado le convenga, se le extiende la presente en la ciudad de Tegucigalpa, municipio del ditrito central a <?php echo $fechaActual ?>
</p>
<form method="POST">
	 <div class="alinearCombobox">
 	<label class="control-label">Seleccione firma</label>
 
<select class="form-control" name="id_firma" id="id_firma">
		<?php
		 include('../crearConexionGECOMP.php'); 
 	$sql=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE ESTATUS=1 ");
 	while($fila=mssql_fetch_array($sql)){
 		 echo "<option value='".$fila['Id_FIRMA']."'>";
 		 echo utf8_encode($fila['NOMBRE_EMPLEADO']); 
 		echo "</option>";
}

include('../cerrarConexionGECOMP.php');
 
 	?>

</select>

 </div>



<br></br>
<br></br>
<br></br>



<div style="text-align: center">
 <hr />
<p>Edificio Lomas Plaza II, Lomas del guijaro, Avenida Republica Dominicana, Tegucigalpa D.M.C, Honduras C.A 1</p>	
<p>apartado postal No, 3730, Tel:(504)2221-3099, FAX:(504)2221-5667</p>	
</div>
 </div>
  <div class="text-center">
     <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='index.php' "style="padding-left:80px;padding-right:80px  ">Cancelar</span> 
</button> 
    <button type="button" class="btn btn-primary" style="padding-left:80px;padding-right:80px  "data-toggle="modal" data-target="#modalh">Imprimir</span> 
</button>    
</div>
</div>
<div class="modal fade" id="modalh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GECOMP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1> ¿Desea imprimir esta pagina?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button name="Imprimir" id="Imprimir" type="submit" class="btn btn-primary">Aceptar</button>
      </div>
     <?php 
if (isset($_POST['Imprimir'])) {
  $Codigo=$_SESSION['logeo'];
  $id=$_POST['id_firma'];

  include('../crearConexionGECOMP.php');
    $fechaActual= date('Y-m-d');
  $optenerAnioFechaActual=date('Y',strtotime($fechaActual));
  
  $contador=0;
  $fechaAInsertar="";
  $codigoGnerado="";
 
 //OPTENER FECHA
 $CompararFecha=mssql_query("SELECT fecha FROM FechaCorrelativa WHERE id= (SELECT MAX(id) FROM FechaCorrelativa)");
 if ($ver=mssql_fetch_array($CompararFecha)) {
   $Comparafecha1= date('Y-m-d', strtotime($ver['fecha']));
   $optenerAnioFecha1=date('Y', strtotime($Comparafecha1));
 }

   if ($optenerAnioFechaActual > $optenerAnioFecha1) {
   $insertarNuevoCorrelativo=mssql_query("INSERT INTO FechaCorrelativa(fecha) VALUES('$fechaActual')");
   $fechaAInsertar=substr($optenerAnioFechaActual, -2);
 }else{
  $fechaAInsertar=substr($optenerAnioFecha1, -2);
 }


 
 //NUMERO_CORRELATIVO
 $validarexisteNumero=mssql_query("SELECT NUMERO_CORRELATIVO FROM CONSTANCIA_GENERADA WHERE  Id_constancia= (SELECT MAX(Id_constancia) FROM CONSTANCIA_GENERADA)");
 if($Dato=mssql_fetch_array($validarexisteNumero)){
  $totalFilas = $Dato['NUMERO_CORRELATIVO']; 
  echo $totalFilas;
  }
if ($totalFilas==0 || $optenerAnioFechaActual > $optenerAnioFecha1) {
  $contador=1;
}else{
  $contador=$totalFilas+1;
}

$codigoGnerado="TSC".$contador."-".$fechaAInsertar;


  // $insertar=mssql_query("INSERT INTO CONSTANCIA_GENERADA(Nombre) VALUES ('sasas') ");
   $insertar=mssql_query("INSERT INTO CONSTANCIA_GENERADA(Tipo_Constancia,cPeriodo,Nombre,Cargo,Asignado,sueldo,Estado,Fecha_Creacion,Usuario_Creacion,Apellido,Codigo_Empleado,NUMERO_CORRELATIVO) VALUES (10,'$codigoGnerado','$Nombre','$cargo','$Asignadoa','$opnetersueldo',1,GETDATE(),'$Codigo','$Apellido','$CodigoEmpleado','$contador' )");

  $id=$_POST['id_firma'];

  $sqa=mssql_query("SELECT Id_constancia FROM CONSTANCIA_GENERADA WHERE Codigo_Empleado='$CodigoEmpleado' and Id_constancia= (SELECT MAX(Id_constancia) FROM CONSTANCIA_GENERADA WHERE Codigo_Empleado='$CodigoEmpleado')");
        while($fila=mssql_fetch_array($sqa)){
            $maximo = $fila['Id_constancia']; 
            }

               $Codigo_cons = 'TSC'.$maximo."-".$CodigoEmpleado;



              $actualizar=mssql_query("UPDATE CONSTANCIA_GENERADA SET cPeriodo='$Codigo_cons' WHERE Id_constancia= '$maximo'");

 if ($insertar==true) {
  echo '<script>location.href="Pdf.php?x='.$id.'&proce='.$CodigoEmpleado.'&ido='.$codigoGnerado.'"</script>';
 }else{
  echo "<script>alert('Error al Guardar Datos')</script>";
 }
  
  
  

//echo "<script>alert('".$id."');</script>";
//echo '<script>location.href="ingresopresupuestario.php?proced="+ c + "&proce="+d;</script>';
}
 ?>
    </div>
  </div>
</div> 
</form>
</div>


  
	
	<!--====== Scripts -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/material.min.js"></script>
	<script src="../js/ripples.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/main.js"></script>
	<script>
		$.material.init();
	</script>
   <footer style="background-color:#011D30;padding: 20px;text-align: center">
    
    <p style="color: white">Copyright &copy Site Name 2019. Ministerio Público.</p>
  </footer>
</body>
</html>