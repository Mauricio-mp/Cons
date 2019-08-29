<?php 
 session_start();
ob_start();
include('../crearConexionGECOMP.php');
include('../Permisos.php');
 $varsession= $_SESSION['username'];
 $val= $_SESSION['CodEmpleado'];
 if($varsession== null || $varsession= ''){
   echo "<script>";
    echo "alert('inicie session');";
    echo "window.location = '../index.php';";
    echo "</script>";

  die();
 }

 //valida permisos
    if (Verificar_Permisos( $val,18)== '0'){ 
       echo "<script>";
       echo "alert('Usted no Cuenta con el Permiso para Ingresar a esta opcion.');";
       echo "window.location = '../Home.php';";
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


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Seguridad<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Usuario<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="../Nuevousuario.php">Nuevo Usuario</a></li>
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
<body style="background-color:#00FFFFFF">
<section class="center">
	
	<div >
      
                 
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td >Codigo del Empleado</td>  
                                    <td>Nombre</td>  
                                    <td>Apellido</td>  
                                    <td>Fecha de creacion de usuario</td>  
                                    <td>Estado</td>  
                                    <td>Accion</td>  

                                    
                               </tr>  
                          </thead>  
                         
                     <?php 
                     $rojo='#FF5733';
                     $verde='#78FF78';
                     $amarillo='rgb(255, 255, 0, .7)';
                     $row=0;
                     	$MostrarUsuario=mssql_query("SELECT * FROM SEIngreso_Login ");
                     	while ($fila=mssql_fetch_array($MostrarUsuario)) {
                     		if ($fila['Estado']==0) {
                     			$fila['Estado']='Anulado';
                     			echo "
                     		
                  <tr>
                     
                    <td style='background-color:".$rojo."'>".$fila['CodEmpleado']."</td>
                    <td style='background-color:".$rojo."'>".$fila['Nombre']."</td>
                    <td style='background-color:".$rojo."'>".$fila['Apellido']."</td>
                    <td style='background-color:".$rojo."'>".$fila['FechaCreacion']."</td>
                    <td style='background-color:".$rojo."'>".$fila['Estado']."</td>
                    <td><a href='optenerDatos.php?x={$fila['Id_Usuario']}'>Modificar</a></td>
                  </tr>";
                     		
                     	}

                     	if ($fila['Estado']==1) {
                     		$fila['Estado']='Activo';
                     			echo "
                     		
                  <tr>
                     
                    <td style='background-color:".$verde."'>".$fila['CodEmpleado']."</td>
                    <td style='background-color:".$verde."'>".$fila['Nombre']."</td>
                    <td style='background-color:".$verde."'>".$fila['Apellido']."</td>
                    <td style='background-color:".$verde."'>".$fila['FechaCreacion']."</td>
                    <td style='background-color:".$verde."'>".$fila['Estado']."</td>
                    <td><a href='optenerDatos.php?x={$fila['Id_Usuario']}'>Modificar</a></td>
                  </tr>";
                     		
                     	}
                     	if ($fila['Estado']==2) {
                     		$fila['Estado']='Pendiente';
                     			echo "
                     		
                  <tr>
                     
                    <td style='background-color:".$amarillo."'>".$fila['CodEmpleado']."</td>
                    <td style='background-color:".$amarillo."'>".$fila['Nombre']."</td>
                    <td style='background-color:".$amarillo."'>".$fila['Apellido']."</td>
                    <td style='background-color:".$amarillo."'>".$fila['FechaCreacion']."</td>
                    <td style='background-color:".$amarillo."'>".$fila['Estado']."</td>
                    <td><a href='optenerDatos.php?x={$fila['Id_Usuario']}'>Modificar</a></td>
                  </tr>";
                     		
                     	}
                     		
                     		}

                     		
                       ?>
                    
                    
                  
                     </table>  
                </div>  
          
                 </div>  
</section>
	<!-- Content page-->



	<!-- Notifications area -->
	

	<!-- Dialog help -->
	 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
	
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