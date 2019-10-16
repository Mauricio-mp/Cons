<!DOCTYPE html>
<html>
<head>
	


	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  


	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/Estilos.css">

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
<body>
	<script>
      $(document).ready(function()
      {
         $("#miModal").modal("show");
      });
    </script>
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">


      </div>


      <div class="modal-body">
      	<form method="POST" class="">
      		 
      	
        

         <?php 
         include('../crearConexionGECOMP.php');

        $nombre=$_GET['x'];
        

         ?>

          <div class="form-group">
         <label>Seleccione La cooperativa</label>
<select class="form-control" name="NOMBRE_COOPERATIVA" id="NOMBRE_COOPERATIVA" onchange="myFunction()">  <option  disabled selected>Seleccionar Opcion</option>
  <?php
  
// echo $nuevafecha;
$query=mssql_query("SELECT *  FROM COOPERATIVAS  WHERE ESTATUS=1 and TRECE_AVO=1 ORDER BY NOMBRE_COOPERATIVA");
while($ejecutar=mssql_fetch_array($query)){
 

  ?>
  
  <option value="<?php echo $ejecutar['Id_Cooperativa'];?>"><?php echo utf8_encode($ejecutar['NOMBRE_COOPERATIVA']); ?></option>
  <?php 
}
   ?>
</select>

<table width="100%"> 
  <tr> 
    <td align="center"> Elija el Tipo de Bono </td> 
 </tr>
   <tr> 
<td>    
     Decimo Tercer mes 
       <input type="radio" name="bonox" value="trece"> 
       </td> 
     </tr> 
     <tr> 
<td>    
      Decimo Cuarto mes    
       <input type="radio" name="bonox" value="catorce">
       </td> 
     </tr>
</table> 
</div>
<script>
    
      function myFunction() {
  
        var NOMBRE_COOPERATIVA=document.getElementById('NOMBRE_COOPERATIVA').value
        
          $.ajax({method:'POST', data:{NOMBRE_COOPERATIVA:NOMBRE_COOPERATIVA},url:'obtenercoop.php',success:function(data)
        {
          //$('#insert').html(data);
          //alert(data);
         $('#prove').html(data);
         
        }             
       });   
    }
   </script>

<div id="prove"></div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="location.href='index.php'">Cancelar</button>
        <input type="submit" name="enviarDato" class="btn btn-primary" value="Aceptar">


      </div>


  </form>
      </div>



  
  
    </div>
  </div>
</div> 
<?php
date_default_timezone_set('America/New_York');
 $variable_validador= 0;
	if (isset($_POST['enviarDato'])) {
 $variable_validador= 0;

$NOMBRE_COOPERATIVA= $_POST['NOMBRE_COOPERATIVA'];
//echo $NOMBRE_COOPERATIVA;
if ($NOMBRE_COOPERATIVA=="") {
$message = "Debe Seleccionar Una Cooperativa";

echo "<script type='text/javascript'>alert('$message');</script>";
 }else{

$mesbono=0;
  $valor = $_POST['bonox']; 
if($valor=="trece")
{
  $bono = "13AVO"; 
$mesbono=12;
  $aniox = gmdate("Y"); 
                            
 $fechabono=gmdate("Y-m-d", strtotime('01'.'-12-'.$aniox));
   //echo  $fechabono; 
}
if($valor=="catorce")
{
   $bono = "14AVO"; 
$mesbono=06;

  $aniox = gmdate("Y"); 
                           
$fechabono=gmdate("Y-m-d", strtotime('01'.'-06-'.$aniox));
  //echo  $fechabono; 
}
if($valor=="")
{
$message =  "Debe seleccionar el tipo de bono.";
 $variable_validador= 1;
}

//validar meses de adelanto  y ver si ya puede solicitar esta constancia
                               include('../crearConexionGECOMP.php');
                            $mostrarDatos44=mssql_query("SELECT MESES_ADELANTO FROM COOPERATIVAS WHERE Id_Cooperativa='$NOMBRE_COOPERATIVA'");
                        if ($row44=mssql_fetch_array($mostrarDatos44)) {
                        $meses = $row44[0];
                            }

                           
                             
                            
                           $fechahoy =  (gmdate("Y-m-d"));  // Fecha de hoy, es lo mismo que:  date("d/m/Y")
                        

                              if (($fechahoy) > ($fechabono))
                              {
                                  //El dia ya ha pasado
                              $fechabono = gmdate("Y-m-d",($fechabono."+ 1 year"));
                          
                            } else {
                                  //Aun no ha llegado el dia o bien estamos en él
                             }  


                                     $datetime1=new DateTime($fechahoy);
                                     $datetime2=new DateTime($fechabono);
                                      # obtenemos la diferencia entre las dos fechas
                                     $interval=$datetime2->diff($datetime1);
                                      # obtenemos la diferencia en meses
                                    $intervalMeses=$interval->format("%m");
                                      # obtenemos la diferencia en años y la multiplicamos por 12 para tener los meses
                                      $intervalAnos = $interval->format("%y")*12;
                                       $valorx =$intervalMeses;
                                       if ($valorx > $meses) {
                                          $message =  "Meses que faltan"." ".$valorx."    "."Meses de Cooperativa"." ".$meses." "."Aun no puede solicitar este bono para este periodo, ";
                                          $variable_validador= 1;
                                         }



include('../crearConexionVam.php');
$mostrarDatos=mssql_query("SELECT * FROM prempy  WHERE cempno='$nombre'");
if ($row=mssql_fetch_array($mostrarDatos)) {

    $identidad =  $row['cfedid'];
   $dia = date("d", strtotime($row['dcntrct']));
   $mes = date("m", strtotime($row['dcntrct']));
   $anio = date("Y", strtotime($row['dcntrct']));   
  // $fechaAcuerdo=fecha($dia,$mes,$anio); 

   $dia1 = date("d");
   $mes1 = date("m");
   $anio1 = date("Y");

    $anioenviar = date("Y");
    $mesenviar = date("m");

$fechaAactual=  date("Y-m-d");
 $fechaAcuerdo_anioactual= $dia."-".$mes."-".$anio1;


<<<<<<< HEAD
if($valor=="trece")
{
  $bono = "13AVO"; 
    $bono1 = "TRE"; 
  $aniox = gmdate("Y");                       
 $fechaAcuerdo_anioactual2 =$bono.$aniox.$identidad;
  $fechaAcuerdo_anioactual21 =$bono1.$aniox.$identidad;
=======
if($valor=="13avo")
{
  $bono = "13AVO"; 
  $aniox = gmdate("Y");                       
 $fechaAcuerdo_anioactual2 =$bono.$aniox.$identidad;
>>>>>>> 8f95afbec4667433e924e5eb590504551e2e3b68
}




<<<<<<< HEAD
if($valor=="catorce")
{
   $bono = "14AVO"; 
    $bono1 = "CAT"; 
=======
if($valor=="14avo")
{
   $bono = "14AVO"; 
>>>>>>> 8f95afbec4667433e924e5eb590504551e2e3b68
$mesbono=06;

  $aniox = gmdate("Y"); 
                           

   
   //$DateNum= Optenerfecha($mes,$anio);
$comprara=date("Y-m-d", strtotime($dia.'-'.$mes.'-'.$anio1));
//inicio de validaciones importantes
if ($comprara < $fechaAactual) {
                        // $message = $fechaAactual." ".$comprara." "."la fecha actual es vmayor";
                      //Evaluar si ya saco ese bono de vacaciones em ambas base de datos, con fecha de acuerdo y anio actual mas 1
                  
                                
                      $fechaAcuerdo_anioactual2 = date("Y-m-d",strtotime($comprara."+ 1 year"));
                      $concatenacion = date("Y-m-d",strtotime($fechaAcuerdo_anioactual2."- 1 month"));;
                          $aniomasuno = date("Y", strtotime($concatenacion)); 
                           $mesenviar = date("m", strtotime($concatenacion));
                          $anioenviar = date("Y", strtotime($fechaAcuerdo_anioactual2));
                         $fechaAcuerdo_anioactual2 =$bono.$aniomasuno.$identidad;
                          $fechaAcuerdo_anioactual21 =$bono1.$aniomasuno.$identidad;

                      
}else{
                      //$message = $fechaAactual." ".$comprara." "."la fecha actual es menor";
 //Evaluar si ya saco ese bono de vacaciones em ambas base de datos, con fecha de acuerdo y anio actual mas 1
                    
                      $fechaAcuerdo_anioactual2 = date("Y-m-d",strtotime($comprara."+ 0 year"));
                      $concatenacion = date("Y-m-d",strtotime($fechaAcuerdo_anioactual2."- 1 month"));;
                          $aniomasuno = date("Y", strtotime($concatenacion)); 
                           $mesenviar = date("m", strtotime($concatenacion));
                          $aniomasuno = date("Y", strtotime($fechaAcuerdo_anioactual2));  
                         $fechaAcuerdo_anioactual2 =$bono.$aniomasuno.$identidad;
                          $fechaAcuerdo_anioactual21 =$bono1.$aniomasuno.$identidad;
         
                   
  }



}









                        include('../cerraConexionVam.php');
                      include('../crearConexionRRHH.php');
                      $mostrarDatos22=mssql_query("SELECT * FROM PR_ConstanciasBonos WHERE cPeriodo='$fechaAcuerdo_anioactual21'");
                        if ($row22=mssql_fetch_array($mostrarDatos22)) {
                          $message = $fechaAcuerdo_anioactual2." "."Ya solicitó esta constancia para este Periodo, En el Sistema de RRHH";
                             $variable_validador= 1;
                            }

                                include('../cerrarConexionRRHH.php');
                      include('../crearConexionGECOMP.php');
                      $mostrarDatos222=mssql_query("SELECT * FROM CONSTANCIA_GENERADA WHERE Estado=1 AND Codigo_Bonos='$fechaAcuerdo_anioactual2'");
                        if ($row222=mssql_fetch_array($mostrarDatos222)) {
                          $message = $fechaAcuerdo_anioactual2." "."Ya solicitó esta constancia para este Periodo, En el Sistema de GECOMP";
                          $variable_validador= 1;
                            }

                                    //hasta aqui termina las validaciones importantes

}

        //evaluar variable validador
    if ($variable_validador== 1) {
            echo "<script type='text/javascript'>alert('$message');</script>";

      }else{
 $opcion=$_POST['opcionMes'];

   $dia = date("d", strtotime($row['dcntrct']));
   $mes = date("m", strtotime($row['dcntrct']));
   $anio = date("Y", strtotime($row['dcntrct']));  

 $anioenviar = date("Y");
   header('Location: Mostrarmodal.php?coop='.$NOMBRE_COOPERATIVA.'&x='.$nombre.'&y='.$anioenviar.'&z='.$mesenviar.'&a='.$fechaAcuerdo_anioactual2.'&b='.$bono.'');

           }

     }
	}
  ?>



</body>
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
</html>