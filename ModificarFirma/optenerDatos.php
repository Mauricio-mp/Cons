<?php 
 session_start();
ob_start();
include('../crearConexionGECOMP.php');
 //$varsession= $_SESSION['username'];
 //if($varsession== null || $varsession= ''){
 // header("location:prueba.php");

 // die();
 //}
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
            <link rel="stylesheet" href="estilos.css">
            
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
  <div class="container">
  <nav class="navbar navbar-inverse">
    <div class="navbar-header"> 
  </div>
  <div class="collapse navbar-collapse js-navbar-collapse">
    <ul class="nav navbar-nav">
 <a class="navbar-brand" href="inicio.php">Usuario</a>
    </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../Home.php">Inicio</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Constancias <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
         <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Constancias de Trabajo<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#"   data-toggle="modal" data-target="#nuevoPorcentaje">Sin Deducciones</a></li>
                       <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">Con Deducciones<span class="caret"></span></a>
                       <ul class="dropdown-menu">
                         <li><a tabindex="-1" href="Porcentaje.php">Normal</a></li>
                           <li><a tabindex="-1" href="Porcentaje.php">Con Plus</a></li>
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
                 <li><a tabindex="-1" href="Porcentaje.php">Modificar Usuario</a></li>
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

<body style="background-color:#00FFFFFF">

<section>
          <div class="center" style="background-color: #FFFFFFFF;">
        	<form  method="post">
         <?php 
         	$id=$_GET['x'];

$CTSD=0;
$CTCDN=0;
$CTCDCP=0;
$CTCDSP=0;
$TRECE_AVO=0;
$CATORCE_AVO=0;
$VAC=0;
$UNIVERSIDADES=0;
$EMBAJADAS=0;
$TSC=0;
$CANCELADOS=0;

         	$SQL=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA ='$id'");
         	if($ejecutar=mssql_fetch_array($SQL)){
         		$ejecutar['NOMBRE_EMPLEADO'];
         		$ejecutar['CTSD'];
         		$ejecutar['CTCDN'];
         		$ejecutar['CTCDCP'];
         		$ejecutar['CTCDSP'];
         		$ejecutar['TRECE_AVO'];
         		$ejecutar['CATORCE_AVO'];
         		$ejecutar['VAC'];
         		$ejecutar['UNIVERSIDADES'];
         		$ejecutar['EMBAJADAS'];
         		$ejecutar['TSC'];
         		$ejecutar['CANCELADOS'];
         		if ($ejecutar['ESTATUS']==0) {
         			echo "<strong>";
         			echo "<script>";
    				echo "alert('ERROR.. No puede Modificar este usuario!');";
    				echo "window.location = 'index.php';";
    				echo "</script>";
    				echo "</strong>";
         		}

         		if ($ejecutar['CTSD']==1) {
         			$CTSD=1;
         		}

         		if ($ejecutar['CTCDN']==1) {
         			$CTCDN=1;
         		}
         		if ($ejecutar['CTCDCP']==1) {
         			$CTCDCP=1;
         		}
         		if ($ejecutar['CTCDSP']==1) {
         			$CTCDSP=1;
         		}
         		if ($ejecutar['TRECE_AVO']==1) {
         			$TRECE_AVO=1;
         		}
         		if ($ejecutar['CATORCE_AVO']==1) {
         			$CATORCE_AVO=1;
         		}
         		if ($ejecutar['VAC']==1) {
         			$VAC=1;
         		}
         		if ($ejecutar['UNIVERSIDADES']==1) {
         			$UNIVERSIDADES=1;
         		}
         		if ($ejecutar['EMBAJADAS']==1) {
         			$EMBAJADAS=1;
         		}
         		if ($ejecutar['TSC']==1) {
         			$TSC=1;
         		}
         		if ($ejecutar['CANCELADOS']==1) {
         			$CANCELADOS=1;
         		}

         	}
          ?>


              <h1 align="center" >DATOS DE FIRMA AUTORIZADA DE CONSTANCIAS</h1>
              <h1 align="center" ></h1>

                         <h1 class="negrita"><?php echo "Codigo del Empleado:\t".$ejecutar['CODIGO_EMPLEADO']; ?></h1>

                         <div class="form-group label-floating">
                        <label class="control-label">Ingrese el nombre Completo</label>
                        <input class="form-control" type="text" value="<?php echo $ejecutar['NOMBRE_EMPLEADO']; ?>" Id="Nombre" name="Nombre" Required onkeypress="return mCheck1(event)" attern="[A-Z ]{2,100}"  title="Unicamente letras mayusculas, minimo 15 y maximo 60" placeholder="Ingrese el Nombre Completo">
                                 <script language="javascript"> 
                                    function mCheck1(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                      if (key == 32) return true
                                     if (key > 64 && key < 91) {
                                       if (field.value == "") return true
                                       regexp = /.[A-Z]{5}$/
                                       return !(regexp.test(field.value))
                                                                      }
                                     if (key == 46) {
                                        if (field.value == "") return false
                                        regexp = /^[A-Z]+$/
                                       return regexp.test(field.value)
                                     }
                                     return false
                                   }
                                  </script>  
                        
                        </div>

                          <div class="form-group label-floating">
                        <label class="control-label">Ingrese El Puesto o Cargo</label>
                        <input class="form-control" type="text" Id="Puesto" value="<?php echo $ejecutar['PUESTO_EMPLEADO']; ?>" name="Puesto" Required placeholder="Ingrese la cantidad de meses de adelanto" min="1" max="12" onkeypress="return mCheck2(event)"  title="Unicamente Numeros, minimo 2 y maximo 100" placeholder="Ingrese El Puesto o Cargo">
                             <script language="javascript"> 
                                    function mCheck2(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                      if (key == 32) return true
                                     if (key > 64 && key < 91) {
                                       if (field.value == "") return true
                                       regexp = /.[A-Z]{5}$/
                                       return !(regexp.test(field.value))
                                                                      }
                                     if (key == 46) {
                                        if (field.value == "") return false
                                        regexp = /^[A-Z]+$/
                                       return regexp.test(field.value)
                                     }
                                     return false
                                   }
                                  </script>  
                        </div>



                            <div class="center" style="background-color: #FFFFFFFF;">
                              <h4 align="center" ><b>Seleccione Las Constancias que esta Autorizado a Firmar</b></h4>
                             <h4 align="center" ><b></b></h4>
        <input type="checkbox" name="CTSD" value="1" <?php if ($CTSD==1) {echo "checked";} ?>> Constancia de Trabajo sin Deducciones<br>
        <input type="checkbox" name="CTCDN" value="1"<?php if ($CTCDN==1) { echo "checked"; }  ?>>  Constancia de Trabajo con Deducciones Normal<br>
        <input type="checkbox" name="CTCDCP" value="1"<?php if ($CTCDCP==1) { echo "checked"; }  ?>> Constancia de Trabajo con Deducciones con Plus<br>
        <input type="checkbox" name="CTCDSP" value="1"<?php if ($CTCDSP==1) { echo "checked"; }  ?>> Constancia de Trabajo con Deducciones sin Plus<br>
        <input type="checkbox" name="TRECE_AVO" value="1"<?php if ($TRECE_AVO==1) { echo "checked"; }  ?>>  Constancia para Bono de 13AVO<br>
        <input type="checkbox" name="CATORCE_AVO" value="1"<?php if ($CATORCE_AVO==1) { echo "checked"; }  ?>> Constancia para Bono de 14AVO<br>
        <input type="checkbox" name="VAC" value="1"<?php if ($VAC==1) { echo "checked"; }  ?>> Constancia para Bono de Vacaciones<br>
        <input type="checkbox" name="UNIVERSIDADES" value="1"<?php if ($UNIVERSIDADES==1) { echo "checked"; }  ?>>  Constancia para Universidades<br>
        <input type="checkbox" name="EMBAJADAS" value="1"<?php if ($EMBAJADAS==1) { echo "checked"; }  ?>> Constancia para Embajadas/Consulados<br>
        <input type="checkbox" name="TSC" value="1"<?php if ($TSC==1) { echo "checked"; }  ?>> Constancia para T.S.C.<br>
        <input type="checkbox" name="CANCELADOS" value="1"<?php if ($CANCELADOS==1) { echo "checked"; }  ?>>  Constancia de Cancelados<br>
                             
                              

                               </div>
                          

                            <div class="">
                               <h4 align="center" ></h4>
                               <button type="submit" name="guardar" class="btn btn-info btn-xs btn-block" >Guardar</button>

                                     <?php
                                     if (isset($_POST['guardar'])) {
                                
                                   //$cEmpleado=utf8_decode($_POST['cEmpleado']);
                                   $Nombre=utf8_decode($_POST['Nombre']);
                                   $Puesto=utf8_decode($_POST['Puesto']);
                                   //$usuario=$_SESSION['logeo'];

                                        if (isset($_POST["CTSD"])) {
                                             $CTSD=1;
                                            } else {
                                               $CTSD=0;
                                                }
                                         if (isset($_POST["CTCDN"])) {
                                             $CTCDN=1;
                                            } else {
                                               $CTCDN=0;
                                                }
                                          if (isset($_POST["CTCDCP"])) {
                                             $CTCDCP=1;
                                            } else {
                                               $CTCDCP=0;
                                                }
                                                  if (isset($_POST["CTCDSP"])) {
                                             $CTCDSP=1;
                                            } else {
                                               $CTCDSP=0;
                                                }
                                                  if (isset($_POST["TRECE_AVO"])) {
                                             $TRECE_AVO=1;
                                            } else {
                                               $TRECE_AVO=0;
                                                }
                                                  if (isset($_POST["CATORCE_AVO"])) {
                                             $CATORCE_AVO=1;
                                            } else {
                                               $CATORCE_AVO=0;
                                                }
                                                  if (isset($_POST["VAC"])) {
                                             $VAC=1;
                                            } else {
                                               $VAC=0;
                                                }
                                                  if (isset($_POST["UNIVERSIDADES"])) {
                                             $UNIVERSIDADES=1;
                                            } else {
                                               $UNIVERSIDADES=0;
                                                }
                                                  if (isset($_POST["EMBAJADAS"])) {
                                             $EMBAJADAS=1;
                                            } else {
                                               $EMBAJADAS=0;
                                                }
                                                  if (isset($_POST["TSC"])) {
                                             $TSC=1;
                                            } else {
                                               $TSC=0;
                                                }
                                                  if (isset($_POST["CANCELADOS"])) {
                                             $CANCELADOS=1;
                                            } else {
                                               $CANCELADOS=0;
                                                }



                                

      $update=mssql_query("UPDATE FIRMA_CONSTANCIAS SET NOMBRE_EMPLEADO='$Nombre',PUESTO_EMPLEADO='$Puesto',CTSD='$CTSD',CTCDN='$CTCDN',CTCDCP='$CTCDCP', CTCDSP='$CTCDSP', TRECE_AVO='$TRECE_AVO',CATORCE_AVO='$CATORCE_AVO', VAC='$VAC', UNIVERSIDADES='$UNIVERSIDADES', EMBAJADAS='$EMBAJADAS', TSC='$TSC', CANCELADOS='$CANCELADOS', USUARIO_MODIFICACION=006354,FECHA_MODIFICACION=getdate() WHERE Id_FIRMA='$id'");
    								  if ($update==true) {
                                            echo "<script>";
    										echo "alert('DATOS ACTUALIZADOS CON EXITO!');";
    										echo "window.location = 'index.php';";
    										echo "</script>";
        									
                                        }else{
                                          echo "<script> alert('Datos no Ingresados'); </script>";
                                        }

                                         
                                       //header("location:Nuevacooperativa.php");


                                     }
                                     ?>

                                     </div> 


          </form>


      </div>
</section>
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
</body>
</html>