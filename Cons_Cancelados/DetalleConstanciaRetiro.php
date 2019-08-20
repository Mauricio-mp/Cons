<?php 
 session_start();
ob_start();
include('../crearConexionVam.php');
 $varsession= $_SESSION['username'];
 if($varsession== null || $varsession= ''){
   echo "<script>";
    echo "alert('inicie session');";
    echo "window.location = '../index.php';";
    echo "</script>";

  die();
 }
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
 include('ConversionFecha.php');
 $firma=$_GET['firma'];
 $codigo=$_GET['codigo'];
 $fechaIncioAcuerdo=$_GET['f_I_A'];
 $fechaFinalAcuerdo=$_GET['f_F_A'];
 $fechaIncioContrato=$_GET['f_I_C'];
 $fechaFinalContrato=$_GET['f_F_C'];
 //$Resolucion=$_GET['Resolucion'];
 $Autoriza=$_GET['Autoriza'];

 $FechaRetiro=$_GET['FechaRetiro'];
$Resolucion=$_GET['Resolucion'];
$FechaResolucion=$_GET['FechaResolucion'];



$Dia_Resolucion=(date('d',strtotime($FechaResolucion)));
 $mes_Resolucion=(date('m',strtotime($FechaResolucion)));
 $anio_Resolucion=(date('Y',strtotime($FechaResolucion)));

$optenerfechaResolucion= fecha($Dia_Resolucion,$mes_Resolucion,$anio_Resolucion);

$Dia_Retiro=(date('d',strtotime($FechaRetiro)));
 $mes_Retiro=(date('m',strtotime($FechaRetiro)));
 $anio_Retiro=(date('Y',strtotime($FechaRetiro)));

 $FechaRetiro=fecha($Dia_Retiro,$mes_Retiro,$anio_Retiro);
 
 $optenerHora= (date('g:i A',strtotime($FechaResolucion)));


 $Dia_Inicio_Contrato=(date('d',strtotime($fechaIncioContrato)));
 $mes_Inicio_Contrato=(date('m',strtotime($fechaIncioContrato)));
 $anio_Inicio_Contrato=(date('Y',strtotime($fechaIncioContrato)));

 $Dia_Final_Contrato=(date('d',strtotime($fechaFinalContrato)));
 $mes_Final_Contrato=(date('m',strtotime($fechaFinalContrato)));
 $anio_Final_Contrato=(date('Y',strtotime($fechaFinalContrato)));

$Dia_Inicio_Acuerdo=(date('d',strtotime($fechaIncioAcuerdo)));
 $mes_Inicio_Acuerdo=(date('m',strtotime($fechaIncioAcuerdo)));
 $anio_Inicio_Acuerdo=(date('Y',strtotime($fechaIncioAcuerdo)));

 $Dia_Final_Acuerdo=(date('d',strtotime($fechaFinalAcuerdo)));
 $mes_Final_Acuerdo=(date('m',strtotime($fechaFinalAcuerdo)));
 $anio_Final_Acuerdo=(date('Y',strtotime($fechaFinalAcuerdo)));


$FechaIncioContrato= fecha($Dia_Inicio_Contrato,$mes_Inicio_Contrato,$anio_Inicio_Contrato);
$FechaFinalContrato= fecha($Dia_Final_Contrato,$mes_Final_Contrato,$anio_Final_Contrato);
$FechaincioAcuerdo= fecha($Dia_Inicio_Acuerdo,$mes_Inicio_Acuerdo,$anio_Inicio_Acuerdo);
$FechaFinalAcuerdo= fecha($Dia_Final_Acuerdo,$mes_Final_Acuerdo,$anio_Final_Acuerdo);


$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fechaActual=fecha1($dia,$mes,$anio);

if ($fechaIncioAcuerdo=='' && $fechaFinalAcuerdo=='') {
  $validar=1;

  $mensaje1="bajo la modalidad de contrato a partir del ".$FechaIncioContrato." al ".$FechaFinalContrato;
}

if ($fechaIncioContrato=='' && $fechaFinalContrato=='') {
  $validar=1;
  $mensaje1="bajo la modalidad de Acuerdo ".$FechaincioAcuerdo." hasta el ".$FechaFinalAcuerdo;
}

if ($validar==0) {
  $mensaje1="bajo la modalidad de contrato a partir del ".$FechaIncioContrato." al ".$FechaFinalContrato." y bajo la modalidad de Acuerdo ".$FechaincioAcuerdo." hasta el ".$FechaFinalAcuerdo;
}


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
    

    $NombreCompleto=utf8_encode($nombre)." ".utf8_encode($apellido);
    $convertirNombre=strtolower($NombreCompleto);
    $NombreCompleto="<strong>".ucwords($convertirNombre)."</strong>";

 }

 $mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=trim($ejecutar['cDesc']);
    $ConvertirDesen=strtolower($desempenio);
    $desempenio=ucwords($ConvertirDesen);
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=trim($asignado['cdeptname']);
    $ConvertiAsignacion=strtolower($asignacion);
    $asignacion=ucwords($ConvertiAsignacion);
}

// Text   ñ  í   ó   ú
$texto1="El (a) sucrito ".$optenerFirma." del Ministerio Público hace constar que ".$NombreCompleto.", con tarjeta de identidad numero ".$identidad." ha laborado por contrato en esta institución ".$mensaje1.", desempeñando el cargo de ".$desempenio.", asignado a ".$asignacion.", interponiendo su retiro Voluntario a partir del ".$FechaRetiro." ante el despacho del señor ".$Autoriza." de la Republica, declara con lugar según Resolución No. ".$Resolucion." Notificado el ".$optenerfechaResolucion." a las ".$optenerHora;

$texto2="Constancia que se expide a petición de parte interesada, en la ciudad de Tegucigalpa, Municipio del Distrito Central, a ".$fechaActual;
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
 	<h4><?php echo $NombreFirma; ?></h4>
 	<h4><?php echo $optenerFirma; ?></h4>
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
      </div>
      <form method="POST">
      <div class="modal-body">
        <h1> ¿Desea imprimir esta pagina?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button name="Imprimir" id="Imprimir" type="submit" class="btn btn-primary">Aceptar</button>
      </div>
  </form>
     <?php 
if (isset($_POST['Imprimir'])) {
 $Firma=$_GET['firma'];
 $Codigo=$_GET['codigo'];
 $FechaIncioAcuerdo=$_GET['f_I_A'];
 $FechaFinalAcuerdo=$_GET['f_F_A'];
 $FechaIncioContrato=$_GET['f_I_C'];
 $FechaFinalContrato=$_GET['f_F_C'];
 $autoriza=$_GET['Autoriza'];
 $fechaRetiro=$_GET['FechaRetiro'];
 $resolucion=$_GET['Resolucion'];
 $fechaResolucion=$_GET['FechaResolucion'];

 header("Location: PdfRetiro.php?f_I_A=$FechaIncioAcuerdo&f_F_A=$FechaFinalAcuerdo&f_I_C=$FechaIncioContrato&f_F_C=$FechaFinalContrato&codigo=$Codigo&firma=$Firma&Autoriza=$autoriza&FechaRetiro=$fechaRetiro&Resolucion=$resolucion&FechaResolucion=$fechaResolucion"); 
}
 ?>
    </div>
  </div>
</div> 


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