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
    if (Verificar_Permisos( $val,14)== '0'){ 
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
</head>

  <!-- SideBar -->
<section id="loadgif">
 <?php include('menu.php'); ?>


</section>

<body class="Fondo">

<section>
          <div class="center" style="background-color: #FFFFFFFF;">
        	<form  method="post">
         


              <h1 align="center" >DATOS DE FIRMA AUTORIZADA DE CONSTANCIAS</h1>
              <h1 align="center" ></h1>

                          <div class="form-group label-floating">
                        <label class="control-label">Ingrese El Codigo de Empleado</label>
                        <input class="form-control" type="text" Id="cEmpleado" name="cEmpleado" Required onkeypress="return mCheck(event)" pattern="[0-9]{5,6}" title="Unicamente Numeros, 6 Numeros" placeholder="Ingrese El Codigo de Empleado">
                                 <script language="javascript"> 
                                    function mCheck(e, field) {
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

                         <div class="form-group label-floating">
                        <label class="control-label">Ingrese el nombre Completo</label>
                        <input class="form-control" type="text" Id="Nombre" name="Nombre" Required onkeypress="return mCheck1(event)" minlength=15 pattern="[A-Z ]{5,60}" title="Unicamente letras mayusculas, minimo 15 y maximo 60" placeholder="Ingrese el Nombre Completo">
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
                        <input class="form-control" type="text" Id="Puesto" name="Puesto" Required placeholder="Ingrese la cantidad de meses de adelanto" min="1" max="12" onkeypress="return mCheck2(event)" pattern="[A-Z ]{15,100}" title="Unicamente Numeros, minimo 15 y maximo 100" placeholder="Ingrese El Puesto o Cargo">
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
                          <input type="checkbox" name="CTSD" value="1"> Constancia de Trabajo sin Deducciones<br>
                          <input type="checkbox" name="CTCD" value="1">  Constancia de Trabajo con Deducciones Normal<br>
                          <input type="checkbox" name="1314_AVO" value="1">  Constancia para Bono de 13AVO/14AVO<br>
                         
                          <input type="checkbox" name="VAC" value="1"> Constancia para Bono de Vacaciones<br>
                          <input type="checkbox" name="UNIVERSIDADES" value="1">  Constancia para Universidades<br>
                          <input type="checkbox" name="EMBAJADAS" value="1"> Constancia para Embajadas/Consulados<br>
                          <input type="checkbox" name="TSC" value="1"> Constancia para T.S.C.<br>
                          <input type="checkbox" name="CANCELADOS" value="1">  Constancia de Cancelados<br>
                             
                              

                               </div>
                          

                            <div class="">
                               <h4 align="center" ></h4>
                               <button type="submit" name="guardar" class="btn btn-info btn-xs btn-block" >Guardar</button>

                                     <?php
                                     if (isset($_POST['guardar'])) {
                                
                                   $cEmpleado=utf8_decode($_POST['cEmpleado']);
                                   $Nombre=utf8_decode($_POST['Nombre']);
                                   $Puesto=utf8_decode($_POST['Puesto']);
                                   //$usuario=$_SESSION['logeo'];

                                        if (isset($_POST["CTSD"])) {
                                             $CTSD=1;
                                            } else {
                                               $CTSD=0;
                                                }
                                         if (isset($_POST["CTCD"])) {
                                             $CTCD=1;
                                            } else {
                                               $CTCD=0;
                                                }
                                     
                                              
                                                  if (isset($_POST["1314_AVO"])) {
                                             $TRECE_AVO=1;
                                            } else {
                                               $TRECE_AVO=0;
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

                                                    $code= $_SESSION['CodEmpleado'];

                                       $res=mssql_query("INSERT INTO FIRMA_CONSTANCIAS (CODIGO_EMPLEADO, NOMBRE_EMPLEADO, PUESTO_EMPLEADO, CTSD, CTCDN, CTCDCP, CTCDSP, TRECE_AVO, CATORCE_AVO, VAC, UNIVERSIDADES, EMBAJADAS, TSC, CANCELADOS, USUARIO_CREACION, FECHA_CREACION, ESTATUS) VALUES ('$cEmpleado','$Nombre','$Puesto','$CTSD','$CTCD',0,0,'$1314_AVO',0,'$VAC','$UNIVERSIDADES','$EMBAJADAS', '$TSC','$CANCELADOS','$code',Getdate(),'1')");
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