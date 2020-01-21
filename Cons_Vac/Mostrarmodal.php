<?php 
 session_start();
ob_start();

include('ConversionSueldo3.php');
include('ConversionFecha3.php');
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
  <link rel="stylesheet" href="../css/canecode_switch.css">


</head>

	<!-- SideBar -->
<section id="loadgif">
<?php include('../Menu1.php'); ?>


</section>

<?php $numero=$_GET['x'];
    $aniomostrar=$_GET['y'];
    $mesmostrar=$_GET['z'];
    $concatenada=$_GET['a'];
    $idCoop=$_GET['coop'];

//echo $numero;
$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fechaActual=fecha1($dia,$mes,$anio); 


$Fechaactual=date("m-Y");
 include('../crearConexionGECOMP.php');

 $validarCons=mssql_query("SELECT * FROM CONSTANCIA_GENERADA WHERE Codigo_Empleado='$numero' and convert(varchar(25),Fecha_Creacion , 105) like '%$Fechaactual%' and Tipo_Constancia='7'");
  $optenerCantidad=mssql_num_rows($validarCons);


   if ($optenerCantidad>=2) {
     echo "<script>alert('A ESTE EMPLEADO SE LE HAN GENERADO ESTA CONSTANCIA ".$optenerCantidad." VECES EN ESTE MES');</script>";
   }



include('../crearConexionVam.php'); 
$mostrarDatos=mssql_query("SELECT * FROM prempy  WHERE cempno='$numero'");
if ($row=mssql_fetch_array($mostrarDatos)) {
	$DESC=$row['cfedid'];
	$codigoPuesto=$row['cjobtitle'];
	$codigoAsignado=$row['cdeptno'];
	$opnetersueldo=$row['nmonthpay'];
  $Codigo_Emplea=$row['cempno'];
	//echo "<script>alert('".$DESC."');</script>";

   $nombreconcatenado =  utf8_encode($row['cfname']).utf8_encode($row['clname']);
 $nom =  utf8_encode($row['cfname']);
  $ape =  utf8_encode($row['clname']);

   $dia1 = date("d", strtotime($row['dhire']));
   $mes1 = date("m", strtotime($row['dhire']));
   $anio1 = date("Y", strtotime($row['dhire']));

   $dia2 = date("d", strtotime($row['dcntrct']));
   $mes2 = date("m", strtotime($row['dcntrct']));
   $anio2 = date("Y", strtotime($row['dcntrct']));
 
   $fechaContrato=fecha($dia1,$mes1,$anio1); 
   $fechaAcuerdo=fecha($dia2,$mes2,$anio2); 


$fechaAactual=  date("Y-m-d");
 $fechaAcuerdo_anioactual= $dia."-".$mes."-".$anio1;
   
   //$DateNum= Optenerfecha($mes,$anio);
$fechacon=date("Y-m-d", strtotime($row['dhire']));
  $fechaac=date("Y-m-d", strtotime($row['dcntrct']));
//inicio de validaciones importantes


if ($fechacon == $fechaac) {
$msg="ha laborado por acuerdo en esta institucion a partir del ".$fechaAcuerdo.", ";
   }
 if ($fechacon<$fechaac) {
    $msg="ha laborado por contrato en esta institucion a partir de ".$fechaContrato." y por acuerdo desde el ".$fechaAcuerdo.", ";
  }

$var=convertir($opnetersueldo);


$vac = "VAC";
$trece = "13AVO";
$catorce = "14AVO";
//verificar si tiene embargos
$mensaje_embargos=" ";
$mostrarDatos1=mssql_query("select ctrsno FROM prtrst where cempno='$numero' and ctrsno = (select max(ctrsno) FROM prtrst where cempno='$numero' and cpayno not like ('%$vac%') and cpayno not like ('%$trece%') and cpayno not like ('%$catorce%'))");
if ($row1=mssql_fetch_array($mostrarDatos1)) {
                   $dato = $row1['ctrsno'];

              $mostrarDatos2=mssql_query("SELECT sum(ndedamt) as embargo FROM prmisd where cempno='$numero' and ctrsno='$dato' and cdedcode=1025");
                if ($row2=mssql_fetch_array($mostrarDatos2)) {
                        //se encontro deduccion con el codigo de embargo
                          $dato1 = $row2['embargo'];

                            if (is_null($dato1)) {
                               $mesletras=fecha3($mesmostrar);
                          $mensaje_embargos="NO TIENE COMPROMETIDO SU BONO DE VACACIONES, EL CUAL SE PAGARA EL MES DE ".$mesletras." DEL AÑO ".$aniomostrar.".";
                               }else{

                         $embargo_letras=convertir($dato1);
                         $mesletras=fecha3($mesmostrar);

                          $mensaje_embargos="TIENE COMPROMETIDO SU BONO DE VACACIONES EN ".$embargo_letras.", EL CUAL SE PAGARA EL MES DE ".$mesletras." DEL AÑO ".$aniomostrar.".";
                               }
                      }else{
                            $mesletras=fecha3($mesmostrar);
                          $mensaje_embargos="NO TIENE COMPROMETIDO SU BONO DE VACACIONES, EL CUAL SE PAGARA EL MES DE ".$mesletras." DEL AÑO ".$aniomostrar.".";
                        }


} else{
                 $mesletras=fecha3($mesmostrar);
                          $mensaje_embargos="NO TIENE COMPROMETIDO SU BONO DE VACACIONES, EL CUAL SE PAGARA EL MES DE ".$mesletras." DEL AÑO ".$aniomostrar.".";

  }

	
}
include('../cerraConexionVam.php');
include('../crearConexionGECOMP.php');


 ?>
<?php 
include('../crearConexionVam.php'); 
$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
  $cargo=$ejecutar['cDesc'];
	$ejecutar['cDesc'];
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
	$asig=  $asignado['cdeptname'];

  $asignado['cdeptname'];
}
include('../cerraConexionVam.php'); 
 ?>
<div class="container">
 



 <div class="center">
<div class="full-box text-center" style="padding: 30px 10px;">
      <img src="../img/9.png" alt="user-picture" class="logo">

      <h4 class="centrartitulo">CONSTANCIAS</h4>
</div>
<p class="parrafo" >El(a) suscrito subjefe del departamento de personal del ministerio publico hace constar que <?php echo utf8_encode($row['cfname'])."\t".utf8_encode($row['clname']);  ?> <?php echo $msg;?> actualmente se desempeña como <?php echo $ejecutar['cDesc']; ?> asignado a: <?php echo utf8_encode($asignado['cdeptname']).","; ?> devengando un salario mensual de:<?php echo $var; echo "\t(".$opnetersueldo.")";?></p>


<p class="parrafo"><?php echo $mensaje_embargos ?>
</p>


<p class="parrafo">Constancia que se expide a peticion de parte interesada, en la Ciudad de Tegucigalpa, Municipio del Ditrito Central a <?php echo $fechaActual ?>
</p>

<form method="POST">
   <div class="ajustar">
    <input id="example" type="checkbox" name="switch" >
<div class="col">
  <label class="control-label">Nombre de Empleado</label>
    <input type="text"  class=" form-control " placeholder="Ingrese Nombre del Empleado" name="Nombre">
    </div>
     <script>
                var $ = jQuery;
                $(function(){
                    canecode_switch("#example","col", ".col");
                });
            </script>

            
  </div>
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

//include('../cerrarConexionGECOMP.php');
 
 	?>

</select>

 </div>
<?php 
if (isset($_POST['Imprimir'])) {
 include('../crearConexionGECOMP.php'); 
  $us= $_SESSION['CodEmpleado'];
  $Name=$_POST['Nombre'];

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

$codigoGnerado="VAC".$contador."-".$fechaAInsertar;


if ($Name=='') {
  $insertar=mssql_query("INSERT INTO CONSTANCIA_GENERADA(Tipo_Constancia,cPeriodo,Nombre,Apellido,Codigo_Empleado,Cargo,Asignado,sueldo,Estado,Usuario_Creacion,Fecha_Creacion,Id_Constancia_Dirigida,NUMERO_CORRELATIVO,Codigo_Bonos,Estado_Entrega) VALUES (7,'$codigoGnerado','$nom','$ape','$Codigo_Emplea','$cargo','$asig','$opnetersueldo',1,'$us' ,getdate(),'$idCoop','$contador','$concatenada',1)");
}else{
  $insertar=mssql_query("INSERT INTO CONSTANCIA_GENERADA(Tipo_Constancia,cPeriodo,Nombre,Codigo_Empleado,Cargo,Asignado,sueldo,Estado,Usuario_Creacion,Fecha_Creacion,Id_Constancia_Dirigida,NUMERO_CORRELATIVO,Codigo_Bonos,Estado_Entrega) VALUES (7,'$codigoGnerado','$Name','$Codigo_Emplea','$cargo','$asig','$opnetersueldo',1,'$us' ,getdate(),'$idCoop','$contador','$concatenada',1)");
}

                                    
                                    if ($insertar) {
                                   
                                              $id=$_POST['id_firma'];
echo '<script>location.href="Pdf.php?x='.$id.'&proce='.$numero.'&y='.$aniomostrar.'&z='.$mesmostrar.'&ido='.$codigoGnerado.'&nombre='.$Name.' "</script>';
                                    }  else{
                                       echo "<script>alert('error')</script>";
                                      }

include('../cerraConexionVam.php'); 


}

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
    <button type="submit" name="Imprimir" id="Imprimir" class="btn btn-primary"style="padding-left:80px;padding-right:80px  ">Imprimir</span> 
</button>    
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
  <script src="../js/canecode_switch.js"></script>
	<script>
		$.material.init();
	</script>
   <footer style="background-color:#011D30;padding: 20px;text-align: center">
    
    <p style="color: white">Copyright &copy Site Name 2019. Ministerio Público.</p>
  </footer>
</body>
</html>