<?php 
 session_start();
ob_start();

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
    if (Verificar_Permisos( $val,10)== '0'){ 
       echo "<script>";
       echo "alert('Usted no Cuenta con el Permiso para Ingresar a esta opcion.');";
       echo "window.location = '../Home.php';";
       echo "</script>";
    } 

include('../crearConexionVam.php');
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>


	 
           
            
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 <link rel="stylesheet" type="text/css" href="../css/Estilos.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  

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
        


<body class="Fondo">
 <style type="text/css">
     .cuadrado{
     width: 250px; 
     height: 100px; 
     border: 3px solid #555;
     background: #FFFFFFFF;
}

 .rojo{
     width: 20px; 
     height: 20px; 
     border: 1px solid #555;
     background: rgba(243, 105, 61,0.8);
     margin-left: 20px;
     margin-top: 10px;
}

.verde{
     width: 20px; 
     height: 20px; 
     border: 1px solid #555;
     background: rgba(51, 255, 144,0.8);
     margin-left: 20px;
     margin-top: 10px;
}
.blanco{
     width: 20px; 
     height: 20px; 
     border: 1px solid #555;
     background: #FFF;
     margin-left: 20px;
     margin-top: 10px;
}

.linear{
  margin-top:1px;
  margin-left:90px;
}
 </style>
     <div class="cuadrado">
        <div class="blanco">
          <p class="linear">ACTIVO</p>
        </div>

         <div class="verde">
          <p class="linear">INACTIVO</p>
        </div>

         <div class="rojo">
          <p class="linear">SUSPENDIDO</p>
        </div>
       
      </div>
<section style="background-color: #F9FAFA;">

  <form method="POST">
    
  

	 <div class="table-responsive">  
                         <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td style="text-align:center;"><b>CODIGO DE EMPLEADO</b></td>  
                                    <td style="text-align:center;"><b>NOMBRE </b></td>  
                                    <td style="text-align:center;"><b>APELLIDO</b></td>  
                                    <td style="text-align:center;"><b>IDENTIDAD</b></td>
                                    <td style="text-align:center;"><b>Accion</b></td>   

                               </tr>  
                          </thead>  
                         <?php
         $consultar=mssql_query("SELECT * FROM prempy ");
		while($mostrar=mssql_fetch_array($consultar)){
      if ($mostrar['cstatus']=="T") {
        $Color="rgba(243, 105, 61,0.8)";
      }
      if ($mostrar['cstatus']=="I") {
        $Color="rgba(51, 255, 144,0.8)";

      }
       if ($mostrar['cstatus']=="A") {
        $Color="";
        
      }
      

		/*	echo "
                  <tr>
                    <td align=\"center\">".utf8_encode($mostrar['cempno'])."</td>
                    <td align=\"center\">".utf8_encode($mostrar['cfname'])."</td>
                    <td align=\"center\">".utf8_encode($mostrar['clname'])."</td>
                    <td align=\"center\">".utf8_encode($mostrar['cfedid'])."</td>
                    <td align=\"center\" ><a  class=\"btn btn-primary mr-2\" href='Modal.php?x={$mostrar[0]}'>Ver</a></td>
                  </tr>";
*/
                   
                ?>


                  <tr>
                    <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo utf8_encode($mostrar['cempno']);?></td>
                    <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo utf8_encode($mostrar['cfname']);?></td>
                    <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo utf8_encode($mostrar['clname']);?></td>
                    <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo utf8_encode($mostrar['cfedid']);?></td>
                    <td style="text-align: center; background-color:<?php echo $Color?>"><a  class="btn btn-primary mr-2" href="DetalleConstancia.php?CodigoEmpleado=<?php echo $mostrar[0] ?>&Status=<?php echo $mostrar[6]?>">Ver</a></td>
                  </tr>

                           <?php 
                          

                            }

                            ?>
                       
                            </table>  

                            
                              
                           
                </div>  
  </form>
</section>

	<!-- Content page-->



	<!-- Notifications area -->
	

	<!-- Dialog help -->
	 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
  <script >
    
function habilitar(form)
{
if(form.opcion.options[1].selected || form.opcion.options[2].selected==true || form.opcion.options[3].selected==true || form.opcion.options[4].selected==true)
  {
     document.getElementById('valor').disabled=false;
     
   }
else
   {
     document.getElementById('valor').disabled=true;
    
     
   }
}
  </script>
  <script>
  $(document).ready(function(){
   var val= document.getElementById('valor').value;
  $('#valor').on('keyup', function(){
   
    if (val=="") {
      document.getElementById('buscar').disabled=false;
    }
  })
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
   <footer style="background-color:#011D30;padding: 20px;text-align: center">
    
    <p style="color: white">Copyright &copy Site Name 2019. Ministerio Público.</p>
  </footer>
</body>
</html>