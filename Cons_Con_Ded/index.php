<?php 
 session_start();
ob_start();
include('../crearConexionVam.php');
$varsession= $_SESSION['username'];
 if($varsession== null || $varsession= ''){
   echo "<script>";
    echo "alert('inicie session');";
    echo "window.location = '../index.php';";
    echo "</script>";

  die();
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
  <div class="container">
  <nav class="navbar navbar-inverse">
    <div class="navbar-header"> 
  </div>
  <div class="collapse navbar-collapse js-navbar-collapse">
    <ul class="nav navbar-nav">
 <a class="navbar-brand" href="../Home.php"><?php echo $_SESSION['username']; ?></a>
    </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../Home.php">Inicio</a></li>
           <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Constancias <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
         <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Constancias de Trabajo<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a  href="../Cons_Sin_Ded">Sin Deducciones</a></li>
          <li><a  href="../Cons_Con_Ded">Con Deducciones</a></li>
        </ul>
      </li>
            <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Bonos<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="../Cons_13-14">13Avo/14Avo</a></li>
           <li><a tabindex="-1" href="../Cons_Vac">Vacaciones</a></li>
        </ul>
      </li>
        <li><a tabindex="-1" href="../Cons_Uni">Universidades</a></li>
          <li><a tabindex="-1" href="../Cons_Emb">Embajadas y Consulados</a></li>
            <li><a tabindex="-1" href="../TSC">T.S.C.</a></li>
              <li><a tabindex="-1" href="Porcentaje.php">Cancelados</a></li>



            
            <!--<li class="divider"></li>
            <li><a href="#">Separated link</a></li>-->
          </ul>
        </li>


       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../Busq_Cons1">ver constancias Emitidas</a></li>
            <li><a href="../Busq_Cons2">Buscar Empleado</a></li>
            <li><a href="../Busq_Cons3">Detalle de Constancias</a></li>
          </ul>

        </li>


         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mantenimiento <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Cooperativas<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="../Nuevacooperativa.php">Nueva</a></li>
                 <li><a tabindex="-1" href="../Listacooperativas.php">Modificar</a></li>
                  </ul>
                 </li>

                <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Firma de Autorizacion<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="../Nuevafirma.php">Nueva</a></li>
                 <li><a tabindex="-1" href="../ModificarFirma">Modificar firma</a></li>
                  </ul>
                 </li>

                 
                
                 <li><a tabindex="-1" href="../Nuevaembajada.php">Nueva Embajada o Consulado</a></li>
                  <li><a tabindex="-1" href="../Nuevaembajada.php">Anular Constancias</a></li>

                   <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Constancia T.S.C<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="../Mant_Acuerdo">Acuerdo</a></li>
                 <li><a tabindex="-1" href="../Mant_Acuerdo/excel.php">Subir Excel</a></li>
                  </ul>
                 </li>

                   <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Constancia Deducciones<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="../Man_Cons_Con">Ingresos</a></li>
                 <li><a tabindex="-1" href="../Man_Cons_Con/deducciones.php">Deducciones</a></li>
                  </ul>
                 </li>                  
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
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button onclick="location.href='../index.php'" type="button" class="btn btn-primary">si</button>
      </div>
    </div>
  </div>
</div> 





<!-- modal de Nuevo Porcentaje de Retencion-->


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
<div class="" style="margin-left:40em; margin-right:40em">

</div>
<section style="background-color: #F9FAFA;">
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
			echo "
                  <tr>
                    <td style=\"text-align: center; background-color:$Color\" align=\"center\">".utf8_encode($mostrar['cempno'])."</td>
                    <td style=\"text-align: center; background-color:$Color\" align=\"center\">".utf8_encode($mostrar['cfname'])."</td>
                    <td style=\"text-align: center; background-color:$Color\" align=\"center\">".utf8_encode($mostrar['clname'])."</td>
                    <td style=\"text-align: center; background-color:$Color\" align=\"center\">".utf8_encode($mostrar['cfedid'])."</td>
                    <td style=\"text-align: center; background-color:$Color\" align=\"center\" ><a  class=\"btn btn-primary mr-2\" href='Modal1.php?x={$mostrar[0]}'>Ver</a></td>
                  </tr>";

                }      
                ?>        
                           
                       
                            </table>  

                            
                              
                           
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