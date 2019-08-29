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

<?php  

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
</head>

	<!-- SideBar -->
</section>

<?php $numero=$_GET['x'];
//echo $numero;
$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fechaActual=fecha1($dia,$mes,$anio); 
include('../crearConexionVam.php'); 
$mostrarDatos=mssql_query("SELECT * FROM prempy  WHERE cempno='$numero'");
if ($row=mssql_fetch_array($mostrarDatos)) {
    $DESC=$row['cfedid'];
    $codigoPuesto=$row['cjobtitle'];
    $codigoAsignado=$row['cdeptno'];
    $opnetersueldo=$row['nmonthpay'];
    $identidad=$row['cfedid'];
    $Nombre=trim($row['cfname']);
    $Apellido=trim($row['clname']);
    //$NombreCompleto=$nombre.$apellido;
	//echo "<script>alert('".$DESC."');</script>";
	
}
  $dia1 = date("d", strtotime($row['dhire']));
   $mes1 = date("m", strtotime($row['dhire']));
   $anio1 = date("Y", strtotime($row['dhire']));

   $dia2 = date("d", strtotime($row['dcntrct']));
   $mes2 = date("m", strtotime($row['dcntrct']));
   $anio2 = date("Y", strtotime($row['dcntrct']));
 
   $fechaContrato=fecha2($dia1,$mes1,$anio1); 
   $fechaAcuerdo=fecha2($dia2,$mes2,$anio2); 

 if ($row['dhire']==$row['dcntrct']) {
    $msg=", labora en esta Institución desde los ".$fechaContrato.", ";
  }
  if ($row['dhire']>$row['dcntrct']) {
    $msg=", labora en esta Institución desde los ".$fechaContrato.", ";
  }
//$var=convertir($opnetersueldo);



include('../cerrarConexionVam.php');
include('../crearConexionGECOMP.php');


 ?>
<?php 
include('../crearConexionVam.php'); 

$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=trim($ejecutar['cDesc']);
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=trim($asignado['cdeptname']);
}
$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fechaActual=fecha2($dia,$mes,$anio); 
include('../cerrarConexionVam.php'); 
 ?>
<div class="container">
 <div class="center">
<div class="full-box text-center" style="padding: 30px 10px;">
      <img src="../img/9.png" alt="user-picture" class="logo">

      <h4 class="centrartitulo">CONSTANCIA</h4>
</div>
<p class="parrafo" >El(La) Suscrito(a), subjefe del departamento de personal del ministerio publico hace constar que <?php echo utf8_encode($row['cfname'])."\t".utf8_encode($row['clname']);  ?> <?php echo $msg;?> actualmente se desempeña como <?php echo $ejecutar['cDesc']; ?> asignado a: <?php echo utf8_encode($asignado['cdeptname'])."."; ?></p>

<p class="parrafo">para los fines que al interesado le convenga, se le extiende la presente en la ciudad de Tegucigalpa, municipio del ditrito central a <?php echo $fechaActual ?>
</p>
<form method="POST">
	 <div class="alinearCombobox">
 	<label class="control-label">Seleccione firma</label>
 
<select class="form-control" name="id_firma" id="id_firma">
		<?php
		 include('../crearConexionGECOMP.php'); 
 	$sql=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE EMBAJADAS=1 AND ESTATUS=1 ");
 	while($fila=mssql_fetch_array($sql)){
 		 echo "<option value='".$fila['Id_FIRMA']."'>";
 		 echo utf8_encode($fila['NOMBRE_EMPLEADO']); 
 		echo "</option>";


}

include('../cerrarConexionGECOMP.php');
 
 	?>

</select>

 </div>

   <div class="alinearCombobox">
  <label class="control-label">Seleccione Embaja/Consulado</label>
 
<select class="form-control" name="id_embajada" id="id_embajada">
    <?php
     include('../crearConexionGECOMP.php'); 
  $embajadaConsulta=mssql_query("SELECT * FROM EMBAJADAS_CONSULADOS ");
  while($optenerId=mssql_fetch_array($embajadaConsulta)){
     echo "<option value='".$optenerId['Id_EMBAJADA']."'>";
     echo utf8_encode($optenerId['NOMBRE_EMBAJADA']); 
    echo "</option>";

    
}

include('../cerrarConexionGECOMP.php');
 
  ?>

</select>

 </div>



  </div>







<?php 
/*
if (isset($_POST['Imprimir'])) {
  $id=$_POST['id_firma'];
  $id1=$_POST['id_'];
 $Codigo=$_SESSION['logeo'];
   $insertar=mssql_query("INSERT INTO CONSTANCIA_GENERADA(Tipo_Constancia,Nombre,Cargo,Asignado,sueldo,Estado,Fecha_Creacion,Usuario_Creacion) VALUES (9,'$NombreCompleto','$desempenio','$asignacion','$opnetersueldo',1,GETDATE(),'$Codigo')");
if ($insertar=true) {
  echo '<script>location.href="Pdf.php?x='.$id.'&y='.$id1.'&proce='.$numero.'"</script>';
}else{
  echo "<script>alert('ERROR')</script>";
}

		
}
*/
//echo "<script>alert('".$id."');</script>";
//echo '<script>location.href="ingresopresupuestario.php?proced="+ c + "&proce="+d;</script>';
 ?>



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
    <button type="button"  class="btn btn-primary"style="padding-left:80px;padding-right:80px  " data-toggle="modal" data-target="#modalh">Imprimir</span> 
</button>   
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
      <?php if (isset($_POST['Imprimir'])) {
      $id=$_POST['id_firma'];
  $id1=$_POST['id_embajada'];
 $Codigo=$_SESSION['logeo'];

   $insertar=mssql_query("INSERT INTO CONSTANCIA_GENERADA(Tipo_Constancia,Nombre,Cargo,Asignado,sueldo,Estado,Fecha_Creacion,Usuario_Creacion,Apellido,Codigo_Empleado) VALUES (9,'$Nombre','$desempenio','$asignacion','$opnetersueldo',1,GETDATE(),'$Codigo','$Apellido','$numero')");
if ($insertar=true) {
  echo '<script>location.href="Pdf.php?x='.$id.'&y='.$id1.'&proce='.$numero.'"</script>';
}else{
  echo "<script>alert('ERROR')</script>";
}

}
 ?>
    </div>

  </div>
</div>  
</div>
  </form>




  
	
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
</body>
</html>