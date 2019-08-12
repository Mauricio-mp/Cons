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
</head>

  <!-- SideBar -->
<section id="loadgif">
  <div class="container">
  <nav class="navbar navbar-inverse">
    <div class="navbar-header"> 
  </div>
  <div class="collapse navbar-collapse js-navbar-collapse">
    <ul class="nav navbar-nav">
 <a class="navbar-brand" href="inicio.php"><?php echo $_SESSION['username']; ?></a>
    </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../Home.php">Inicio</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Constancias <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
         <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Constancias de Trabajo<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="../Cons_Sin_Ded" >Sin Deducciones</a></li>
                       <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">Con Deducciones<span class="caret"></span></a>
                       <ul class="dropdown-menu">
                         <li><a tabindex="-1" href="index.php">Normal</a></li>
                           <li><a tabindex="-1" href="../Cons_Con_Plus">Con Plus</a></li>
                              <li><a tabindex="-1" href="Porcentaje.php">Sin Plus</a></li>
                        </ul>
                      </li>
        </ul>
      </li>
            <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Bonos<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#"   data-toggle="modal" data-target="#nuevoPorcentaje">13AVO</a></li>
          <li><a tabindex="-1" href="Porcentaje.php">14AVO</a></li>
           <li><a tabindex="-1" href="Porcentaje.php">Vacaciones</a></li>
        </ul>
      </li>
        <li><a tabindex="-1" href="Porcentaje.php">Universidades</a></li>
          <li><a tabindex="-1" href="Porcentaje.php">Embajadas y Consulados</a></li>
            <li><a tabindex="-1" href="Porcentaje.php">T.S.C.</a></li>
              <li><a tabindex="-1" href="Porcentaje.php">Cancelados</a></li>



            
            <!--<li class="divider"></li>
            <li><a href="#">Separated link</a></li>-->
          </ul>
        </li>


       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="Man_mp.php">1</a></li>
            <li><a href="Man_pr.php">2</a></li>
            <li><a href="cai.php">3</a></li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mantenimiento <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Cooperativas<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="Nuevacooperativa.php">Nueva</a></li>
                 <li><a tabindex="-1" href="Listacooperativas.php">Modificar</a></li>
                  </ul>
                 </li>

                <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Firma de Autorizacion<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="Nuevafirma.php">Nueva</a></li>
                 <li><a tabindex="-1" href="Porcentaje.php">Modificar</a></li>
                  </ul>
                 </li>
                
                 <li><a tabindex="-1" href="Nuevaembajada.php">Nueva Embajada o Consulado</a></li>
                 <li><a tabindex="-1" href="Nuevaembajada.php">Anular Constancias</a></li>
          </ul>
        </li>



        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Seguridad<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Usuario<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="Porcentaje.php">Nuevo Usuario</a></li>
                 <li><a tabindex="-1" href="index.php">Modificar Usuario</a></li>
                  </ul>
                 </li>
                <li><a tabindex="-1" href="Porcentaje.php">Crear Roll</a></li>
                 <li><a tabindex="-1" href="Porcentaje.php">Cambiar Clave</a></li>
          </ul>
        </li>




        
        <li><a href="#"   data-toggle="modal" data-target="#miModal">Cerra Session</a></li>
        
        
<!-- Modal -->
<div class="modal fade" id="nuevoPorcentaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SICORE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1> ¿Desea cerrar session?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button onclick="location.href='cerrarSesion.php'" type="button" class="btn btn-primary">si</button>
      </div>
    </div>
  </div>
</div> 





<!-- modal de Nuevo Porcentaje de Retencion-->


</section>

<?php $numero=$_GET['x'];
$opcion=$_GET['opcion'];

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
  $nombreEmpleado=$row['cfname'];
  $ConvMas=strtolower($nombreEmpleado);
  $nombreEmpleado=ucwords($ConvMas);
  $apellidoEmpleado=$row['clname'];
  $conMin=strtolower($apellidoEmpleado);
  $apellidoEmpleado=ucwords($conMin);
  $nombreCompleto="<strong>".$nombreEmpleado." ".$apellidoEmpleado."</strong>";
  $Nombre=$row['cfname'];
  $Apellido=$row['clname'];
  //echo "<script>alert('".$DESC."');</script>";

   $dia1 = date("d", strtotime($row['dhire']));
   $mes1 = date("m", strtotime($row['dhire']));
   $anio1 = date("Y", strtotime($row['dhire']));

   $dia2 = date("d", strtotime($row['dcntrct']));
   $mes2 = date("m", strtotime($row['dcntrct']));
   $anio2 = date("Y", strtotime($row['dcntrct']));
 
   $fechaContrato=fecha($dia1,$mes1,$anio1); 
   $fechaAcuerdo=fecha($dia2,$mes2,$anio2); 
   $DateNum= Optenerfecha($mes,$anio);

  if ($row['dhire']==$row['dcntrct']) {
    $msg="ha laborado por acuerdo en esta institucion a partir del ".$fechaContrato.", ";
  }
  if ($row['dhire']>$row['dcntrct']) {
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
  $Asignadoa=$asignado['cdeptname'];
}
include('../cerrarConexionVam.php'); 

 ?>
<div class="container">
 <div class="center">
  <?php 
  $suma1=0;
  $suma2=0;
          $optenerTotal=mssql_query("SELECT * FROM prmisc WHERE cempno ='$numero' and cpayno='$opcion' and cpaycode !='100'");
          while($consultar=mssql_fetch_array($optenerTotal)){
            $consultar['nothntax']=$consultar['nothntax'] *-1;
            $suma1=$suma1+$consultar['nothntax'];
              }

         $optenerTotal1=mssql_query("SELECT * FROM prmisd WHERE cempno='$numero' AND cpayno='$opcion'");
         while($row=mssql_fetch_array($optenerTotal1)){
           
           $Cant_dedu = $row['ndedamt'];
           
           $suma2=$suma2+$Cant_dedu;
           //$cantida=$Cant_dedu;
          //$formato=number_format($cantida,2);
          
          //echo $Cant_dedu;
            
         }   
         $total=$suma1+$suma2;
         $sumaTotal=convertir($total);
         $formatoTotal=number_format($total,2);
         $totalNeto=$opnetersueldo-$total;
         $formatoNeto=number_format($totalNeto,2);
         
   ?>
<div class="full-box text-center" style="padding: 30px 10px;">
      <img src="../img/9.png" alt="user-picture" class="logo">

      <h4 class="centrartitulo">CONSTANCIAS</h4>
      <p class="parrafo" >El(a) suscrito subjefe del departamento de personal del ministerio publico hace constar que <?php echo utf8_encode($nombreCompleto)."\t";  ?> <?php echo $msg;?> actualmente se desempeña como <?php echo $ejecutar['cDesc']; ?> asignado a: <?php echo utf8_encode($asignado['cdeptname']).","; ?> devengando un salario mensual de:<?php echo $var; echo "\t(".number_format($opnetersueldo,2).")";?> Teniendo:</p>

</br>
<h3>Ingresos</h3>
<table style="margin-left:60px;font-size:15px"; border="0" width="80%">
  <thead >  
  <tr>
    <td></td>
  </tr>    
  </thead>
  <tbody>
    <tr >
      <td style="padding:5px;text-align:left"><strong>Ingresos Permanetes</strong></td>  

    </tr>
    <tr>
    <?php 
    $cont=0;
    $sumadorDeduccionesPermanentes=0;
    include('../crearConexionVam.php');
    $sql=mssql_query("SELECT * FROM prmisc WHERE cempno = '$numero' and cpayno='$opcion' and cpaycode !='IHSS' and cpaycode!='INJUPEMP'");
    while($optenerDatos= mssql_fetch_array($sql)){
      $codigoVam=$optenerDatos['cpaycode'];
include('../crearConexionGECOMP.php');
$verconsulta=mssql_query("SELECT * FROM  DEDUCCION_INGRESO WHERE CODIGO_INGRESO='$codigoVam' and PERMANENTE='1'");
while($verconsulta1=mssql_fetch_array($verconsulta)){
  $IngresoPermanente=$verconsulta1['DESCRIPCION'];
  $monto1=$optenerDatos['nothtax'];
  $cont=$cont+$monto1;






    
    ?>
      <td style="text-align:left"><?php echo $IngresoPermanente;?></td>
      <td></td>
      <td><?php echo  "L.".$monto1;?></td>
      <td></td>
      </tr>
      <?php
    }
      }
      ?>
      <tr>
      <td style="padding:5px;text-align:left"><strong>Ingresos Temporales</strong></td> 
      
      

    </tr>

    <tr>
      <?php 
        include('../crearConexionVam.php');
    $ConsultaTemporal=mssql_query("SELECT * FROM prmisc WHERE cempno = '$numero' and cpayno='$opcion' and cpaycode !='IHSS' and cpaycode!='INJUPEMP'");
    while($optenerDatosTempral= mssql_fetch_array($ConsultaTemporal)){
      $CodigoDatoVam=$optenerDatosTempral['cpaycode'];
include('../crearConexionGECOMP.php');
$ConsultaGECOMP=mssql_query("SELECT * FROM  DEDUCCION_INGRESO WHERE CODIGO_INGRESO='$CodigoDatoVam' and TEMPORAL=1");
while($verconsulta=mssql_fetch_array($ConsultaGECOMP)){
  $IngresoTemporal=$verconsulta['DESCRIPCION'];
  $monto2=$optenerDatosTempral['nothtax'];
  $cont=$cont+$monto2;





      ?>
      <td style="text-align:left"><?php echo $IngresoTemporal;?></td>
      <td></td>
      <td><?php echo  "L.".$monto2; ?></td>
      <td></td>
      </tr>
      <?php 
      }

    }
       ?>
    <tr>
    <td style="text-align:left;padding:5px"><strong>Total De Ingresos</strong></td>  
      <td></td>
      <td></td>
      <td><?php echo  "L.".$cont;?></td>
      </tr>
  </tbody>
 
                       
</table>  

<h3>Deducciones</h3>
<table style="margin-left:60px;font-size:15px"; border="0" width="80%">
  <thead >  
  <tr>
    <td></td>
  </tr>    
  </thead>
  <tbody>
    <tr >
      <td style="padding-top: 10px;text-align:left"><strong>deducciones Permanentes</strong></td>  


    </tr>
     <tr >
      <?php 
      include('../crearConexionVam.php');
      $verdeducciones=mssql_query("SELECT * FROM prmisc WHERE cempno = '$numero' and cpayno='$opcion' and cpaycode ='INJUPEMP'");
      while($verDatos=mssql_fetch_array($verdeducciones)){
        $positivo1=$verDatos['nothntax']*-1;
        $sumadorDeduccionesPermanentes= $sumadorDeduccionesPermanentes+$positivo1;
      

       ?>
      <td style="text-align:left;padding-top: 10px"><?php echo $verDatos['cref'] ?></td>  
      <td><?php echo  "L.".$positivo1; ?></td>
      <td></td>
      <td></td>

    <?php } ?>
    </tr>

    <tr >
      <?php 
      include('../crearConexionVam.php');
      $verdeduccionesIHSS=mssql_query("SELECT * FROM prmisc WHERE cempno = '$numero' and cpayno='$opcion' and cpaycode ='IHSS'");
      while($verDatosIHSS=mssql_fetch_array($verdeduccionesIHSS)){
         $positivo2=$verDatosIHSS['nothntax']*-1;
        $sumadorDeduccionesPermanentes= $sumadorDeduccionesPermanentes+$positivo2;
      

       ?>
      <td style="text-align:left;padding-top: 10px"><?php echo $verDatosIHSS['cref'] ?></td>  
      <td><?php echo  "L.".$positivo2; ?></td>
      <td></td>
      <td></td>

    <?php } ?>
    </tr>

    <tr>
    <?php 
    include('../crearConexionVam.php');
    $Permanentes=mssql_query("SELECT * FROM prmisd WHERE cempno = '$numero' and cpayno='$opcion'");
    while($OptenerDatosPer= mssql_fetch_array($Permanentes)){
      $CodigoVam=$OptenerDatosPer['cdedcode'];

include('../crearConexionGECOMP.php');
$VerConsultaPermanentes=mssql_query("SELECT * FROM  DEDUCCION_DEDUCCIONES WHERE CODIGO_DEDUCCION='$CodigoVam' and PERMANENTE=1");
while($verconsulta3=mssql_fetch_array($VerConsultaPermanentes)){
  $DeduccionesPermanentes=$verconsulta3['DESCRIPCION'];
  $monto=$OptenerDatosPer['ndedamt'];
  
  $sumadorDeduccionesPermanentes=$sumadorDeduccionesPermanentes+$monto;






    
    ?>
      <td style="text-align:left;padding-top: 10px"><?php echo $DeduccionesPermanentes;?></td>
     <td><?php echo "L.".$monto ?></td>
      <td></td>
       <td></td>
      </tr>
      <?php
    }
      }
      ?>

       <tr>
      <td style="text-align:left;padding-top: 10px"><strong>Total deducciones Permanentes</strong></td> 
      <td></td>
      <td></td>
      <td><?php echo  "L.".$sumadorDeduccionesPermanentes; ?></td>
      
    </tr>


      <tr>
      <td style="text-align:left;padding-top: 10px"><strong>Deducciones Temporales</strong></td> 
      
    </tr>

   <tr>
    <?php 
    $sumadorDeduccionesTemporales=0;
    include('../crearConexionVam.php');
    $PermanentesVam=mssql_query("SELECT * FROM prmisd WHERE cempno = '$numero' and cpayno='$opcion'");
    while($OptenerTeporalVam= mssql_fetch_array($PermanentesVam)){
      $DatosVam=$OptenerTeporalVam['cdedcode'];

include('../crearConexionGECOMP.php');
$VaerDeduccionesTemporales=mssql_query("SELECT * FROM  DEDUCCION_DEDUCCIONES WHERE CODIGO_DEDUCCION='$DatosVam' and TEMPORAL=1");
while($verconsulta4=mssql_fetch_array($VaerDeduccionesTemporales)){
  $DeduccionesTemporales=$verconsulta4['DESCRIPCION'];
  $MOntoTempral=$OptenerTeporalVam['ndedamt'];
  
  $sumadorDeduccionesTemporales=$sumadorDeduccionesTemporales+$MOntoTempral;






    
    ?>
      <td style="text-align:left"><?php echo $DeduccionesTemporales;?></td>
     <td><?php echo "L.".$MOntoTempral ?></td>
      <td></td>
       <td></td>
      </tr>
      <?php
    }
      }
      ?>


    <td style="text-align:left;padding-top: 10px"><strong>Total deducciones Temporales</strong></td>  
      <td></td>
      <td></td>
      <td><?php echo "L".$sumadorDeduccionesTemporales; ?></td>
      </tr>

      <tr>
        <td style="text-align:left;padding-top: 10px">TOTAL DEDUCCIONES</td>
        <td></td>
        <td></td>
        <td><strong><?php $Total_Deduccines=$sumadorDeduccionesPermanentes+ $sumadorDeduccionesTemporales;
          echo "L.".$Total_Deduccines;
        ?></strong></td>
      </tr>

      <tr>
        <td style="text-align:left;padding-top: 10px">TOTAL NETO</td>
        <td></td>
        <td></td>
        <td><strong><?php $Total_neto=$cont-$Total_Deduccines;
          echo "L.".$Total_neto;
        ?></strong></td>
      </tr>
  </tbody>
 
                       
</table>  

        </br>
        </br>
<p class="parrafo">para los fines que al interesado le convenga, se le extiende la presente en la ciudad de Tegucigalpa, municipio del ditrito central a <?php echo $fechaActual ?>
</div>
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
  // $insertar=mssql_query("INSERT INTO CONSTANCIA_GENERADA(Nombre) VALUES ('sasas') ");
   $insertar=mssql_query("INSERT INTO CONSTANCIA_GENERADA(Tipo_Constancia,Nombre,Cargo,Asignado,sueldo,Estado,Fecha_Creacion,Usuario_Creacion,Codigo_Empleado,Apellido) VALUES (2,'$Nombre','$cargo','$Asignadoa','$opnetersueldo',1,GETDATE(),'$Codigo','$numero','$Apellido')");

  $id=$_POST['id_firma'];

 if ($insertar==true) {
  echo '<script>location.href="Pdf.php?firma='.$id.'&numero='.$numero.'&opcion='.$opcion.'"</script>';
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