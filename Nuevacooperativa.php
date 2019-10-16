<?php 
 session_start();
ob_start();
include('crearConexionGECOMP.php');
include('Permisos.php');
 $varsession= $_SESSION['username'];
 $val= $_SESSION['CodEmpleado'];
 if($varsession== null || $varsession= ''){
   echo "<script>";
    echo "alert('inicie session');";
    echo "window.location = './index.php';";
    echo "</script>";

  die();
 }

 //valida permisos
    if (Verificar_Permisos( $val,12)== '0'){ 
       echo "<script>";
       echo "alert('Usted no Cuenta con el Permiso para Ingresar a esta opcion.');";
       echo "window.location = './Home.php';";
       echo "</script>";
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
            <link rel="stylesheet" href="estilos.css">
            
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">

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
 <?php include('menu.php'); ?>


</section>

<body class="Fondo">

<section>
          <div class="center" style="background-color: #FFFFFFFF;">
        	<form  method="post">
         


              <h1 align="center" >CREAR NUEVA COOPERATIVA</h1>

                          <div class="form-group label-floating">
                        <label class="control-label">Ingrese las Siglas de la Cooperativa</label>
                        <input class="form-control" type="text" Id="siglas" name="siglas" Required onkeypress="return mCheck(event)" pattern="[A-Z.]{2,20}" title="Unicamente letras mayusculas, minimo 2 y maximo 20" placeholder="Ingrese las Siglas de la Cooperativa">
                                 <script language="javascript"> 
                                    function mCheck(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                      // if (key == 32) return true
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
                        <label class="control-label">Ingrese el nombre de la Cooperativa</label>
                        <input class="form-control" type="text" Id="nombrec" name="nombrec" Required onkeypress="return mCheck1(event)" pattern="[A-Z ]{15,100}" title="Unicamente letras mayusculas, minimo 15 y maximo 100" placeholder="Ingrese el nombre de la Cooperativa">
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
                        <label class="control-label">Ingrese la cantidad de meses de adelanto</label>
                        <input class="form-control" type="number" Id="meses" name="meses" Required placeholder="Ingrese la cantidad de meses de adelanto" min="1" max="12" onkeypress="return mCheck2(event)" pattern="[0-9]{1,2}" title="Unicamente Numeros, minimo 1 y maximo 12" placeholder="Ingrese el nombre de la Cooperativa">
                              <script language="javascript"> 
                                    function mCheck2(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                    //  if (key == 32) return true
                                     if (key > 47 && key < 58) {
                                       if (field.value == "") return true
                                       regexp = /.[0-9]{5}$/
                                       return !(regexp.test(field.value))
                                                                      }
                                  
                                     return false
                                   }
                                  </script>  
                        </div>

                            <div class="center" style="background-color: #FFFFFFFF;">
                              <h4 align="center" ><b>Selecciones los bonos que esta cooperativa ofrece</b></h4>
                             
                          <input type="checkbox" name="cvac" value="1"> Vacaciones<br>
                            <input type="checkbox" name="c13avo" value="1">  Trece Avo<br>
                              <input type="checkbox" name="c14avo" value="1"> Catorce Avo<br>
                              

                               </div>
                          

                            <div class="">
                               <h4 align="center" ></h4>
                               <button type="submit" name="guardar" class="btn btn-info btn-xs btn-block" >Guardar</button>

                                     <?php
                                     if (isset($_POST['guardar'])) {
                                
                                   $siglas=utf8_decode($_POST['siglas']);
                                   $nombre=utf8_decode($_POST['nombrec']);
                                   $meses=utf8_decode($_POST['meses']);
                                   //$usuario=$_SESSION['logeo'];

                                        if (isset($_POST["cvac"])) {
                                             $cvac=1;
                                            } else {
                                               $cvac=0;
                                                }
                                         if (isset($_POST["c13avo"])) {
                                             $c13avo=1;
                                            } else {
                                               $c13avo=0;
                                                }
                                          if (isset($_POST["c14avo"])) {
                                             $c14avo=1;
                                            } else {
                                               $c14avo=0;
                                                }
                                          $cod= $_SESSION['CodEmpleado'];
                                       $res=mssql_query("INSERT INTO COOPERATIVAS (SIGLAS_COOPERATIVA, NOMBRE_COOPERATIVA, MESES_ADELANTO, VAC, TRECE_AVO, CATORCE_AVO, USUARIO_CREACION, FECHA_CREACION, ESTATUS) VALUES ('$siglas','$nombre','$meses','$cvac','$c13avo','$c14avo','$cod',Getdate(),'1')");
                                        if ($res==true) {
                                          echo "<script> alert('Datos Almacenados con Exito'); </script>";
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
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/sweetalert2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/material.min.js"></script>
	<script src="js/ripples.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>