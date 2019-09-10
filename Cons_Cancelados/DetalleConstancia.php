<?php 
 session_start();
ob_start();
include('../crearConexionVam.php');
 $varsession= $_SESSION['username'];
 $usuarioCreacion=$_SESSION['logeo'];
 if($varsession== null || $varsession= ''){
   echo "<script>";
    echo "alert('inicie session');";
    echo "window.location = '../index.php';";
    echo "</script>";

  die();
 }

 $estado=$_GET['Status'];

 if ($estado=='A' || $estado=='I') {
   echo "<script>";
    echo "alert('SOLO EMPLEADOS CANCELADOS');";
    echo "window.location = 'index.php';";
    echo "</script>";}
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

	<style>
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
</style>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
</head>

	<!-- SideBar -->
<section id="loadgif">

    <?php include '../Menu.php'; ?>


</section>
<body class="Fondo">

 <div class="Disenio" style=" border: 1px solid #555;">
<img src="../img/9.png" style=" width:40%; margin-left: 22em">
<br></br>
  <h3 style="text-align: center; font-family:Arial">CONSTANCIA</h3>
   <br></br>
 </br>
 <?php 
 $validar=0;
 include('ConversionFecha.php');
 $codigo=$_GET['x'];
 $Fechaactual=date("m-Y");
 include('../crearConexionGECOMP.php');

 $validarCons=mssql_query("SELECT * FROM CONSTANCIA_GENERADA WHERE Codigo_Empleado='$codigo' and convert(varchar(25),Fecha_Creacion , 105) like '%$Fechaactual%' and Tipo_Constancia='11'");
  $optenerCantidad=mssql_num_rows($validarCons);


   if ($optenerCantidad>=2) {
     echo "<script>alert('A ESTE EMPLEADO SE LE HAN GENERADO ESTA CONSTANCIA ".$optenerCantidad." VECES EN ESTE MES');</script>";
   }
//  $fechaIncioAcuerdo=$_GET['f_I_A'];
//  $fechaFinalAcuerdo=$_GET['f_F_A'];

//  $fechaIncioContrato=$_GET['f_I_C'];
//  $fechaFinalContrato=$_GET['f_F_C'];


//  $Dia_Inicio_Contrato=(date('d',strtotime($fechaIncioContrato)));
//  $mes_Inicio_Contrato=(date('m',strtotime($fechaIncioContrato)));
//  $anio_Inicio_Contrato=(date('Y',strtotime($fechaIncioContrato)));

//  $Dia_Final_Contrato=(date('d',strtotime($fechaFinalContrato)));
//  $mes_Final_Contrato=(date('m',strtotime($fechaFinalContrato)));
//  $anio_Final_Contrato=(date('Y',strtotime($fechaFinalContrato)));

// $Dia_Inicio_Acuerdo=(date('d',strtotime($fechaIncioAcuerdo)));
//  $mes_Inicio_Acuerdo=(date('m',strtotime($fechaIncioAcuerdo)));
//  $anio_Inicio_Acuerdo=(date('Y',strtotime($fechaIncioAcuerdo)));

//  $Dia_Final_Acuerdo=(date('d',strtotime($fechaFinalAcuerdo)));
//  $mes_Final_Acuerdo=(date('m',strtotime($fechaFinalAcuerdo)));
//  $anio_Final_Acuerdo=(date('Y',strtotime($fechaFinalAcuerdo)));


// $FechaIncioContrato= fecha($Dia_Inicio_Contrato,$mes_Inicio_Contrato,$anio_Inicio_Contrato);
// $FechaFinalContrato= fecha($Dia_Final_Contrato,$mes_Final_Contrato,$anio_Final_Contrato);
// $FechaincioAcuerdo= fecha($Dia_Inicio_Acuerdo,$mes_Inicio_Acuerdo,$anio_Inicio_Acuerdo);
// $FechaFinalAcuerdo= fecha($Dia_Final_Acuerdo,$mes_Final_Acuerdo,$anio_Final_Acuerdo);


$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fechaActual=fecha1($dia,$mes,$anio);

// if ($fechaIncioAcuerdo=='' && $fechaFinalAcuerdo=='') {
// 	$validar=1;

// 	$mensaje1="bajo la modalidad de contrato a partir del ".$FechaIncioContrato." al ".$FechaFinalContrato;
// }

// if ($fechaIncioContrato=='' && $fechaFinalContrato=='') {
// 	$validar=1;
// 	$mensaje1="bajo la modalidad de Acuerdo ".$FechaincioAcuerdo." hasta el ".$FechaFinalAcuerdo;
// }

// if ($validar==0) {
// 	$mensaje1="bajo la modalidad de contrato a partir del ".$FechaIncioContrato." al ".$FechaFinalContrato." y bajo la modalidad de Acuerdo ".$FechaincioAcuerdo." hasta el ".$FechaFinalAcuerdo;
// }


include('../crearConexionGECOMP.php');
$Consultafirma=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA='$firma'");
if ($filaFirma=mssql_fetch_array($Consultafirma)) {
	$optenerFirma=$filaFirma['PUESTO_EMPLEADO'];
	$NombreFirma=$filaFirma['NOMBRE_EMPLEADO'];

	$ConvertirNombre=strtolower($NombreFirma);
	$NombreFirma=ucwords($ConvertirNombre);
	$convFirma=strtolower($optenerFirma);
	$optenerFirma=ucwords($convFirma);
}
include('../crearConexionVam.php');
$ConsultaNombre=mssql_query("SELECT * FROM prempy  WHERE cempno='$codigo'");
if ($row=mssql_fetch_array($ConsultaNombre)) {
    $DESC=$row['cfedid'];
    $codigoPuesto=$row['cjobtitle'];
    $codigoAsignado=$row['cdeptno'];
    $opnetersueldo=$row['nmonthpay'];
    $nombre=trim($row['cfname']);
    $apellido=trim($row['clname']);
    $identidad=$row['cfedid'];
    $fechaIncioContrato=$row['dhire'];
    $fechaFinalAcuerdo=$row['dterminate'];
    $terminado=$row['ctaxstate'];
    // $date_future = strtotime('-1 day', strtotime($fechaFinalContrato));
    // $fechaFinalContrato = date('d-m-Y', $date_future);
    $fechaInicioAcuerdo=$row['dcntrct'];

    $date_future = strtotime('-1 day', strtotime($fechaInicioAcuerdo));
    $date_future = date('d-m-Y', $date_future);

     $Dia_Inicio_Contrato=(date('d',strtotime($fechaIncioContrato)));
     $mes_Inicio_Contrato=(date('m',strtotime($fechaIncioContrato)));
     $anio_Inicio_Contrato=(date('Y',strtotime($fechaIncioContrato)));

     $Dia_Final_Contrato=(date('d',strtotime($date_future)));
     $mes_Final_Contrato=(date('m',strtotime($date_future)));
     $anio_Final_Contrato=(date('Y',strtotime($date_future)));

     $Dia_Inicio_Acuerdo=(date('d',strtotime($fechaInicioAcuerdo)));
     $mes_Inicio_Acuerdo=(date('m',strtotime($fechaInicioAcuerdo)));
     $anio_Inicio_Acuerdo=(date('Y',strtotime($fechaInicioAcuerdo)));

      $Dia_Final_Acuerdo=(date('d',strtotime($fechaFinalAcuerdo)));
      $mes_Final_Acuerdo=(date('m',strtotime($fechaFinalAcuerdo)));
      $anio_Final_Acuerdo=(date('Y',strtotime($fechaFinalAcuerdo)));

     $FechaIncioContrato= fecha($Dia_Inicio_Contrato,$mes_Inicio_Contrato,$anio_Inicio_Contrato);
     $FechaFinalContrato= fecha($Dia_Final_Contrato,$mes_Final_Contrato,$anio_Final_Contrato);
     $FechaincioAcuerdo= fecha($Dia_Inicio_Acuerdo,$mes_Inicio_Acuerdo,$anio_Inicio_Acuerdo);
     $FechaFinalAcuerdo= fecha($Dia_Final_Acuerdo,$mes_Final_Acuerdo,$anio_Final_Acuerdo);

    if ($terminado=='TA') {
      $mensaje1="por la modalidad de Contrato en el periodo comprendido del ".$FechaIncioContrato." al ".$FechaFinalContrato." y Acuerdo el ".$FechaincioAcuerdo." al ".$FechaFinalAcuerdo;
    }
    //  if ($fechaIncioContrato==$fechaInicioAcuerdo) {
    //   $mensaje1="por la modalidad de Contrato el ".$FechaincioAcuerdo." al ".$FechaFinalAcuerdo;
    // }

    if ($terminado=='TC') {
       $mensaje1="por la modalidad de Contrato el ".$FechaincioAcuerdo." al ".$FechaFinalAcuerdo;
    }


    


    $NombreCompleto=utf8_encode($nombre)." ".utf8_encode($apellido);
    $NombresCompletos=$NombreCompleto;
    $convertirNombre=strtoupper($NombreCompleto);
    $NombreCompleto="<strong>".ucwords($convertirNombre)."</strong>";

 }

 $mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=trim($ejecutar['cDesc']);
    $cargo=$desempenio;
    $ConvertirDesen=strtolower($desempenio);
    $desempenio=ucwords($ConvertirDesen);
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=trim($asignado['cdeptname']);
    $Asignados=$asignacion;
    $ConvertiAsignacion=strtolower($asignacion);
    $asignacion=ucwords($ConvertiAsignacion);
}

// Text   ñ  í   ó   ú
$texto1="El (la) sucrito ".$optenerFirma." del Ministerio Público hace constar que ".$NombreCompleto.", con tarjeta de identidad numero ".$identidad.", laboró en esta institución ".$mensaje1.", desempeñando el cargo de ".$desempenio.", asignado a ".utf8_encode($asignacion);

$texto2="Constancia que se extiende a petición de parte interesada, en la ciudad de Tegucigalpa, Municipio del Distrito Central, a ".$fechaActual;
  ?>
 <p class="parrafoCancelados">
 	<?php echo $texto1; ?> 
 </p>
 <br></br>

<p class="parrafoCancelados">
 	<?php echo $texto2; ?> 
 </p>
  <br></br>
  <br></br>
   <br></br>

 <div align="center">
 	<h4>_______________________________</h4>
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
 </div>
 <br></br>
  <br></br>
   <br></br>

 <div align="center">
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

<div class="modal fade" id="modalh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GECOMP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>Asignado
     
      <div class="modal-body">
        <h1> ¿Desea imprimir esta pagina?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button name="Imprimir" id="Imprimir" type="submit" class="btn btn-primary">Aceptar</button>
      </div>
 
     <?php 
if (isset($_POST['Imprimir'])) {
  $firma=$_POST['id_firma'];
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

$codigoGnerado="CAN".$contador."-".$fechaAInsertar;




 $insertar=mssql_query("INSERT INTO CONSTANCIA_GENERADA(Tipo_Constancia,cPeriodo,Nombre,Cargo,Asignado,sueldo,Estado,Apellido,Codigo_Empleado,Fecha_Creacion,Usuario_Creacion,Estado_Entrega,NUMERO_CORRELATIVO) VALUES(11,'$codigoGnerado','$nombre','$cargo','$Asignados','$opnetersueldo',1,'$apellido','$codigo',GETDATE(),'$usuarioCreacion',1,'$contador')");

 // $CompararFecha=mssql_query("SELECT fecha FROM FechaCorrelativa WHERE id= (SELECT MAX(id) FROM FechaCorrelativa)");
 // if ($ver=mssql_fetch_array($CompararFecha)) {
 //   $Comparafecha1= date('Y', strtotime($ver['fecha']));

 // }

 // if ($fechaActual> $Comparafecha1) {
 //  $fechaInsersion=date('Y-m-d');
 //   $insertarNuevoCorrelativo=mssql_query("INSERT INTO FechaCorrelativa(fecha) VALUES('$fechaInsersion')");
   


 // }else{

 // }

 //  $sqa=mssql_query("SELECT Id_constancia FROM CONSTANCIA_GENERADA WHERE Codigo_Empleado='$codigo' and Id_constancia= (SELECT MAX(Id_constancia) FROM CONSTANCIA_GENERADA WHERE Codigo_Empleado='$codigo')");
 //        if($fila=mssql_fetch_array($sqa)){
 //            $maximo = $fila['Id_constancia']; 
 //            }


 //               $Codigo_cons = 'CAN'.$maximo.$codigo;


 //              $actualizar=mssql_query("UPDATE CONSTANCIA_GENERADA SET cPeriodo='$Codigo_cons' WHERE Id_constancia= '$maximo'");


 if ($insertar==true) {
 	 header("Location: Pdf.php?CodigoEmpleado=$codigo&firma=$firma&ido=$codigoGnerado"); 
 }else{
  echo "<script>alert('Error al Guardar Datos')</script>";
 }


}
 ?>
    </div>
  </div>
</div> 
</form>

	<!-- Content page-->



	<!-- Notifications area -->
	

	<!-- Dialog help -->


	
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