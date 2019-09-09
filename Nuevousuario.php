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
    if (Verificar_Permisos( $val,17)== '0'){ 
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
            <link rel="stylesheet" href="Estilos.css">
            
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
        	<form  method="post" id="add_name" name="add_name">
         


              <h1 align="center" >CREAR NUEVO ROL DE ACCESO</h1>
              <h1 align="center" ></h1>

                         
                          <div class="form-group label-floating">
                        <label class="control-label">Ingrese el Codigo de Empleado</label>
                        <input class="form-control" type="text" Id="codigo" name="codigo" Required placeholder="Ingrese el Codigo de empleado Ej. 009999"  onkeypress="return mCheck2(event)" pattern="[0-9]{6,6}" title="Unicamente Numeros, 6 digitos" placeholder="Ingrese el codigo de empleado ej. 009999">
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

                           <div class="form-group label-floating">
                        <label class="control-label">Ingrese la Contrasena</label>
                        <input class="form-control" type="text" Id="contrasena1" name="contrasena1" Required onkeypress="return mCheck(event)" pattern="[A-Za-z0-9]{6,50}" title="Unicamente Letras y numeros" placeholder="Ingrese la Contrasena">
                                 <script language="javascript"> 
                                    function mCheck(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                     if (key > 64 && key < 91) {
                                       if (field.value == "") return true
                                       regexp = /.[A-Z]{5}$/
                                       return !(regexp.test(field.value))
                                                                      }
                                     if (key > 47 && key < 58) {
                                        if (field.value == "") return false
                                        regexp = /^[0-9]+$/
                                       return regexp.test(field.value)
                                     }
                                      if (key > 97 && key < 123) {
                                        if (field.value == "") return false
                                        regexp = /^[a-z]+$/
                                       return regexp.test(field.value)
                                     }
                                     return false
                                   }
                                  </script>  
                        </div>

                      

             



                          <div class="form-group label-floating">
                        <label class="control-label">Ingrese El Nombre del usuario</label>
                        <input class="form-control" type="text" Id="nombre" name="nombre" onkeypress="return soloLetras1(event)" pattern="[A-Z ]{2,50}" title="Unicamente Letras Mayusculas, Minimo 2 y Maximo 50" placeholder="Ingrese El Nombre del Nuevo Usuario">
                                  <script language="javascript"> 
                                    function soloLetras1(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                        if (key == 32) return true
                                     if (key > 64 && key < 91) {
                                       if (field.value == "") return true
                                       regexp = /.[A-Z]{5}$/
                                       return !(regexp.test(field.value))
                                                                      }
                                    
                                    
                                     return false
                                   }
                                  </script>   
                        </div>

                         <div class="form-group label-floating">
                        <label class="control-label">Ingrese El Apellido del usuario</label>
                        <input class="form-control" type="text" Id="apellido" name="apellido" onkeypress="return soloLetras1(event)" pattern="[A-Z ]{2,50}" title="Unicamente Letras Mayusculas, Minimo 2 y Maximo 50" placeholder="Ingrese El Apellido del Nuevo Usuario">
                                
                        </div>


                        <div class="form-group">
                  <label  class="control-label">Seleccione Rol</label>
                     <select  id="rol" name="rol" class="form-control">
                         <option  disabled selected>Seleccione Rol</option>
                   <?php
                      
                      $result2=mssql_query("SELECT * FROM SERoles");
                                                 while($row4 = mssql_fetch_array($result2)){

                      echo "<option value='".$row4['Id_Rol']."'>";
                    echo $row4['Nombre']; 
                    echo "</option>";                 
                        } 
                       ?>
                        
                       </select>
                    </div>
                       <script type="text/javascript">
              $(document).ready(function(){
        $("#rol").change(function () {
          $("#rol option:selected").each(function () {
            elegido = $(this).val();
            $.post("fetch.php", { elegido: elegido }, function(data){
              //$("#nombre").html(data);
                  $('#inserted_item_data').html(data);
//$("#mostrarDatos").html(data);
              //alert(data);
            });            
          });
        });
  });
        </script>

                        

                            <div class="center" style="background-color: #FFFFFFFF;">
                              <h4 align="center" ><b> Accesos que Tendra este Usuario</b></h4>
                             <h4 align="center" ><b></b></h4>
                         
                       
                             <div id="inserted_item_data"></div>

                              

                               </div>
                          

                            <div class="">
                               <h4 align="center" ></h4>
                               <button type="submit" name="guardar" class="btn btn-info btn-xs btn-block" >Guardar</button>

                                     <?php
                                     if (isset($_POST['guardar'])) {
                                       $control=0;
                                       $codigo=$_POST['codigo'];
                                       $contrasenia=$_POST['contrasena1'];
                                       $nombre= $_POST['nombre'];
                                       $apellido= $_POST['apellido'];
                                       $rol=$_POST['rol'];


                                              $validar=mssql_query("SELECT * FROM SEIngreso_Login");
                                     while($ejecutar= mssql_fetch_array($validar)) {
                                      if ($codigo== $ejecutar['CodEmpleado']) {
                                        $control=1;
                                      }

                                       }
                                         if ($control==1) {
                                      echo "<script> alert('EL Usuario \t ".$codigo."\t YA EXISTE, POR FAVOR ESCRIBA OTRO. '); </script>";
                                                    }


                                                         if ($control==0) {
                                                             $us= $_SESSION['CodEmpleado'];
                                      $insertar=mssql_query("INSERT INTO SEIngreso_Login(CodEmpleado,Contrasenia,Nombre,Apellido,Id_Rol,Estado,UsarioCreacion,FechaCreacion) VALUES ('$codigo','$contrasenia','$nombre','$apellido','$rol',1,'$us',getdate())");
                                    
                                    if ($insertar) {
                                    echo "<script>alert('datos insertados Correctamente')</script>";
                                   
                                    }  

                                    }
                                        }
                                     
                                     ?>

                                     </div> 

          </form>


      </div>
</section>
<script type="text/javascript">
  function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
</script>
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