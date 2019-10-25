<?php 
 session_start();
ob_start();
include('crearConexionGECOMP.php');
include('Permisos.php');
 
 $val1= $_SESSION['username'];

 echo Verificar_Permisos( $val1,19);
    if (Verificar_Permisos( $val1,19)== '0'){ 
       echo "<script>";
       echo "alert('Usted no Cuenta con el Permiso para Ingresar a esta opcion.');";
       echo "window.location = './Home.php';";
       echo "</script>";
    } 
 $varsession= $_SESSION['username'];

 if($varsession== null || $varsession= ''){
   echo "<script>";
    echo "alert('inicie session');";
    echo "window.location = './index.php';";
    echo "</script>";

  die();
 }

 //valida permisos
    if (Verificar_Permisos( $varsession,19)== '0'){ 
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
         


              <h1 align="center" >CREAR NUEVO ROL DE ACCESO</h1>
              <h1 align="center" ></h1>

                          <div class="form-group label-floating">
                        <label class="control-label">Ingrese El Nombre del Nuevo Rol</label>
                        <input class="form-control" type="text" Id="CNuevorol" name="CNuevorol" Required onkeypress="return mCheck(event)" pattern="[A-Z 0-9 ]{6,50}" title="Unicamente Letras Mayusculas y Numeros, Minimo 6 y Maximo 50" placeholder="Ingrese El Nombre del Nuevo Rol">
                                 <script language="javascript"> 
                                    function mCheck(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                      if (key == 32) return true
                                     if (key > 64 && key < 91) {
                                       if (field.value == "") return true
                                       regexp = /.[A-Z]{5}$/
                                       return !(regexp.test(field.value))
                                        }
                                       if (key > 47 && key < 58) {
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
                              <h4 align="center" ><b>Seleccione Los Accesos que Tendra este Rol</b></h4>
                          <h4 align="center" ><b></b></h4>
                          <input type="checkbox" name="CTSD" value="1"> Constancia de Trabajo sin Deducciones<br>
                          <input type="checkbox" name="CTCD" value="1">  Constancia de Trabajo con Deducciones<br>
                          <input type="checkbox" name="TRECE_AVO" value="1">  Constancia para Bono de 13AVO/14AVO<br>
                          <input type="checkbox" name="VAC" value="1"> Constancia para Bono de Vacaciones<br>
                          <input type="checkbox" name="UNIVERSIDADES" value="1">  Constancia para Universidades<br>
                          <input type="checkbox" name="EMBAJADAS" value="1"> Constancia para Embajadas/Consulados<br>
                          <input type="checkbox" name="TSC" value="1"> Constancia para T.S.C.<br>
                          <input type="checkbox" name="CANCELADOS" value="1">  Constancia de Cancelados<br>
                          <input type="checkbox" name="NC" value="1"> Nueva Cooperativa<br>
                          <input type="checkbox" name="MC" value="1">  Mantenimiento Cooperativa<br>
                          <input type="checkbox" name="NFA" value="1"> Nueva Firma de Autorizacion<br>
                          <input type="checkbox" name="MFA" value="1"> Mantenimiento de Firma de Autorizacion<br>
                          <input type="checkbox" name="NEC" value="1">  Nueva Emabaja/Consulado<br>
                          <input type="checkbox" name="NU" value="1"> Nuevo Usuario<br>
                          <input type="checkbox" name="MU" value="1"> Mantenimiento Usuario<br>
                          <input type="checkbox" name="CR" value="1">  Crear Roll<br>
                          <input type="checkbox" name="CV" value="1"> Cambiar Clave<br>
                          <input type="checkbox" name="AC" value="1"> Anular Constancias<br>
                        
                          <input type="checkbox" name="cbx1" value="1"> Datos del Acuerdo para Constancia del T.S.C.<br>
                          <input type="checkbox" name="cbx2" value="1"> Excel para Constancias del T.S.C.<br>
                          <input type="checkbox" name="cbx3" value="1"> Mantenimiento a Ingresos para constancia con Deducciones<br>
                          <input type="checkbox" name="cbx4" value="1"> Mantenimiento a Deducciones para constancia con Deducciones<br>
                          <input type="checkbox" name="cbx5" value="1"> Reporte de Constancias Emitidas Entre Fechas<br>
                          <input type="checkbox" name="cbx6" value="1"> Reporte de Constancias Emitidas por Empleado<br>
                          <input type="checkbox" name="cbx7" value="1"> Reporte de Constancias Generadas entre fechas<br>
                              

                               </div>
                          

                            <div class="">
                               <h4 align="center" ></h4>
                               <button type="submit" name="guardar" class="btn btn-info btn-xs btn-block" >Guardar</button>

                                     <?php
                                     if (isset($_POST['guardar'])) {
                                      $val=0;
                                
                                   $Nuevorol=utf8_decode($_POST['CNuevorol']);

                                   $validarRol=mssql_query("SELECT * FROM SERoles");
                                   while($ejecutar= mssql_fetch_array($validarRol)) {
                                      if ($Nuevorol== $ejecutar['Nombre']) {
                                        $val=1;
                                      }

                                   }
                                    if ($val==1) {
                                      echo "<script> alert('EL ROL:\t ".$Nuevorol."\t YA EXISTE, POR FAVOR ELIGA OTRO '); </script>";
                                    }
                                    if ($val==0) {
                                       $res1=mssql_query("INSERT INTO SERoles (Nombre, USUARIO_CREACION, FECHA_CREACION) VALUES ('$Nuevorol','$val1',Getdate())");
                                        if ($res1==true) {
                                              $res2=mssql_query("SELECT MAX(Id_Rol) AS Id_Rol FROM SERoles");
                                                 while($row = mssql_fetch_array($res2)){
                                                         $idrol = number_format($row[0]);
                                                  }

                                        }



                                     function insertar ($idrol, $Id_Permiso) {
                                          $val1= $_SESSION['CodEmpleado'];
                             
                                       $res=mssql_query("INSERT INTO SERoles_Permisos (Id_Rol, Id_Permiso, USUARIO_CREACION, FECHA_CREACION) VALUES ('$idrol','$Id_Permiso','$val1',Getdate())");
                                        if ($res==true) {
                                          $res1=1;
                                        }else{
                                         $res1=0;
                                        }

                                       }


                                             if (isset($_POST["CTSD"])) {
                                             $Id_Permiso=1;
                                             insertar($idrol, $Id_Permiso);
                                            } 

                                             if (isset($_POST["CTCD"])) {
                                             $Id_Permiso=2;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                            
                                               if (isset($_POST["TRECE_AVO"])) {
                                             $Id_Permiso=5;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                                
                                                  if (isset($_POST["VAC"])) {
                                             $Id_Permiso=7;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                             if (isset($_POST["UNIVERSIDADES"])) {
                                             $Id_Permiso=8;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                            if (isset($_POST["EMBAJADAS"])) {
                                             $Id_Permiso=9;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                             if (isset($_POST["TSC"])) {
                                             $Id_Permiso=10;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                             if (isset($_POST["CANCELADOS"])) {
                                             $Id_Permiso=11;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["NC"])) {
                                             $Id_Permiso=12;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["MC"])) {
                                             $Id_Permiso=13;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["NFA"])) {
                                             $Id_Permiso=14;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                             if (isset($_POST["MFA"])) {
                                             $Id_Permiso=15;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["NEC"])) {
                                             $Id_Permiso=16;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["NU"])) {
                                             $Id_Permiso=17;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["MU"])) {
                                             $Id_Permiso=18;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["CR"])) {
                                             $Id_Permiso=19;
                                             insertar($idrol, $Id_Permiso);
                                            }
                                              if (isset($_POST["CV"])) {
                                             $Id_Permiso=20;
                                             insertar($idrol, $Id_Permiso);
                                            }
                                                 if (isset($_POST["AC"])) {
                                             $Id_Permiso=21;
                                             insertar($idrol, $Id_Permiso);
                                            }

                                                if (isset($_POST["cbx1"])) {
                                             $Id_Permiso=22;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["cbx2"])) {
                                             $Id_Permiso=23;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["cbx3"])) {
                                             $Id_Permiso=24;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["cbx4"])) {
                                             $Id_Permiso=25;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["cbx5"])) {
                                             $Id_Permiso=26;
                                             insertar($idrol, $Id_Permiso);
                                            }
                                              if (isset($_POST["cbx6"])) {
                                             $Id_Permiso=27;
                                             insertar($idrol, $Id_Permiso);
                                            }
                                                 if (isset($_POST["cbx7"])) {
                                             $Id_Permiso=28;
                                             insertar($idrol, $Id_Permiso);
                                            }




                                             
                                              if ($res1==1) {
                                          echo "<script> alert('Datos Almacenados con Exito'); </script>";
                                        }else{
                                          echo "<script> alert('Datos no Ingresados'); </script>";
                                        }
                                    }
                                  
                                   //$usuario=$_SESSION['logeo'];


                                        
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