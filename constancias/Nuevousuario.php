<?php 
 session_start();
ob_start();
include('crearConexion.php');
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
  <div class="container">
  <nav class="navbar navbar-inverse">
    <div class="navbar-header"> 
  </div>
  <div class="collapse navbar-collapse js-navbar-collapse">
    <ul class="nav navbar-nav">
 <a class="navbar-brand" href="inicio.php">Usuario</a>
    </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="Home.php">Inicio</a></li>
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
                 <li><a tabindex="-1" href="ModificarUsuario">Modificar Usuario</a></li>
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
                        <input class="form-control" type="text" Id="nombre" name="nombre" onkeypress="return soloLetras(event)" pattern="[A-Z ]{2,50}" title="Unicamente Letras Mayusculas, Minimo 2 y Maximo 50" placeholder="Ingrese El Nombre del Nuevo Usuario">
                                 <script language="javascript"> 
                                    function soloLetras(e){
                     var key = window.event ? e.which : e.keyCode;
                     if (key < 91  || key > 64) {
                     e.preventDefault();
                         }
                          } function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
                                  </script>  
                        </div>

                         <div class="form-group label-floating">
                        <label class="control-label">Ingrese El Apellido del usuario</label>
                        <input class="form-control" type="text" Id="apellido" name="apellido" onkeypress="return soloLetras(event)" pattern="[A-Z ]{2,50}" title="Unicamente Letras Mayusculas, Minimo 2 y Maximo 50" placeholder="Ingrese El Apellido del Nuevo Usuario">
                                 <script language="javascript"> 
                                    function soloLetras(e){
                     var key = window.event ? e.which : e.keyCode;
                     if (key < 91  || key > 64) {
                     e.preventDefault();
                         }
                          } function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
                                  </script>  
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
                              <h4 align="center" ><b>Seleccione Los Accesos que Tendra este Rol</b></h4>
                             <h4 align="center" ><b></b></h4>
                         
                       
                             <div id="inserted_item_data"></div>

                              

                               </div>
                          

                            <div class="">
                               <h4 align="center" ></h4>
                               <button type="submit" name="guardar" class="btn btn-info btn-xs btn-block" >Guardar</button>

                                     <?php
                                     if (isset($_POST['guardar'])) {
                                    
                                       $codigo=$_POST['codigo'];
                                       $contrasenia=$_POST['contrasena1'];
                                       $nombre= $_POST['nombre'];
                                       $apellido= $_POST['apellido'];
                                       $rol=$_POST['rol'];

                                      $insertar=mssql_query("INSERT INTO SEIngreso_Login(CodEmpleado,Contrasenia,Nombre,Apellido,Id_Rol,Estado,UsarioCreacion,FechaCreacion) VALUES ('$codigo','$contrasenia','$nombre','$apellido','$rol',1,6352,getdate())");
                                    
                                    if ($insertar) {
                                    echo "<script>alert('datos insertados Correctamente')</script>";
                                   
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