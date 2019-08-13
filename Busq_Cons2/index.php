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
  <?php include '../Menu.php'; ?>


</section>
        


<body class="Fondo">
<div class="" style="margin-left:10em; margin-right:10em">
<section style="background-color: #F9FAFA;">
  <div class="center container">
    <form method="POST" >
      <div  class="form-group">
        <label>Escriba el nombre del empleado</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre del Empleado" required="required">
      </div>

      <div  class="form-group">
        <label>Seleccione fecha Minima</label>
        <input type="date" class="form-control" name="fechaMinima">

      </div>

      <div  class="form-group">
        <label>Seleccione fecha Maxima</label>
         <input type="date" class="form-control" name="fechaMaxima">
      </div>
      
      <div style="text-align: center" class="form-group"> 
        <button type="text" name="BtnAceptar" class="btn btn-primary" style="padding-left:80px;padding-right:80px  ">Aceptar</button>
      </div>
    </form>
  </div>


</section>

</div>
<div style="background-color:#FFF;">
  
   <div id="example_wrapper" class="dataTables_wrapper table-responsive">
  
   <table id="myexample" class="display nowrap dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
      <thead class="bg-gray">
        <tr role="row">
            <th style="text-align: center">Tipo de Constancia</th>
            <th style="text-align: center">Codigo de Empleado</th>
            <th style="text-align: center;padding-left: 50px;padding-right: 50px ">Nombre</th>
            <th style="text-align: center;padding-left: 50px;padding-right: 50px">Apellido</th>
            <th style="text-align: center;padding-left: 60px;padding-right: 60px ">Cargo</th>
            <th style="text-align: center;padding-left: 60px;padding-right: 60px ">Asignado</th>
            <th style="text-align: center">Sueldo</th>
            <th style="text-align: center">Estado</th>
            <th style="text-align: center">Observacion</th>
            <th style="text-align: center">Fecha de Creacion</th>
            <th style="text-align: center">Usuario de Creacion</th>
            <th style="text-align: center">Fecha de Modificacion</th>
            <th style="text-align: center">Usuario de Modificacion</th>

         </tr>
      </thead>
      
      <tbody>
 
          <?php 
   if (isset($_POST['BtnAceptar'])) {
     include('../crearConexionGECOMP.php');
          $fechaminima=$_POST['fechaMinima'];
          $fechamaxima=$_POST['fechaMaxima'];
          $nombre=$_POST['nombre'];
          

          

          if (strtotime($fechamaxima) < strtotime($fechaminima)) {
             echo "<script>";
    echo "alert('ASEGURESE QUE LAS FECHAS SEAN CORRECTAS');";
    echo "window.location = 'index.php';";
    echo "</script>";
          }

          


          
          $consultar=mssql_query("SELECT * FROM CONSTANCIA_GENERADA WHERE Fecha_Creacion between ' $fechaminima' and '$fechamaxima' AND Nombre like '%$nombre%'");
          while ($fila=mssql_fetch_array($consultar)) {
            $fila['Tipo_Constancia'];
            if ($fila['Tipo_Constancia']=="1") {
              $fila['Tipo_Constancia']="Constancia de trabajo Sin deducciones";
            }
            if ($fila['Tipo_Constancia']=="2") {
              $fila['Tipo_Constancia']="Constancia de trabajo con deducciones normal";
            }
            if ($fila['Tipo_Constancia']=="3") {
              $fila['Tipo_Constancia']="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila['Tipo_Constancia']=="4") {
              $fila['Tipo_Constancia']="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila['Tipo_Constancia']=="5") {
              $fila['Tipo_Constancia']="Constancia para Bono de 13AVO";
            }
            if ($fila['Tipo_Constancia']=="6") {
              $fila['Tipo_Constancia']="Constancia para Bono de 14AVO";
            }
            if ($fila['Tipo_Constancia']=="7") {
              $fila['Tipo_Constancia']="Constancia para Bono de Vacaciones";
            }
            if ($fila['Tipo_Constancia']=="8") {
              $fila['Tipo_Constancia']="Constancia para Universidades";
            }
            if ($fila['Tipo_Constancia']=="9") {
              $fila['Tipo_Constancia']="Constancia para Embajadas/Consulados";
            }
            if ($fila['Tipo_Constancia']=="10") {
              $fila['Tipo_Constancia']="Constancia para T.S.C.";
            }
            if ($fila['Tipo_Constancia']=="11") {
              $fila['Tipo_Constancia']="Constancia de Cancelados";
            }

            if (empty($fila['Fecha_Modificacion'])) {
              $fila['Fecha_Modificacion']="No hay Modificaciones";
            }

            if (empty($fila['Usuario_Modifcacion'])) {
              $fila['Usuario_Modifcacion']="No hay Modificaciones";
            }

            if (empty($fila['Observacion'])) {
              $fila['Observacion']="No hay Observaciones";
            }

            if ($fila['Estado']=="1") {
              $fila['Estado']="ACTIVO";
              $Color="rgba(245, 252, 251,0.8)";


            }
            if ($fila['Estado']=="0") {
              $fila['Estado']="INACTIVO";
              $Color="rgba(243, 105, 61,0.8)";
              
            }

            $fecha=date("Y/m/d", strtotime($fila['Fecha_Creacion']));
  
           ?>
           <tr>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Tipo_Constancia'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Codigo_Empleado'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Nombre'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Apellido'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Cargo'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Asignado'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['sueldo'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Estado'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Observacion'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fecha;?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Usuario_Creacion'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Fecha_Modificacion'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Usuario_Modifcacion'];?></td>

           </tr>

           <?php 
         }
       }
           ?>
     </tbody>
   </table>

 
   
   <script type="text/javascript">
     $(document).ready(function(){
    $('#myexample').DataTable(
        {
            "searching": true,
            paging: true


    });
    
   $(".tr-show").click(function(){
        // $("#myexample > tbody").append('<tr><td scope="col" colspan="13" rowspan="1">Rozwinięcie / dodanie dodatkowej treśći</td></tr>');
        
        $("#updated_contacts").append($(".addElement span").clone());        
    

    });
    
});
   </script>
<!--<tr class="add-here">-->

<!--</tr>-->
<!--<tr class="add-hiere">-->
<!--    <td colspan="13">-->
<!--        <ul>-->
<!--            <li>Sprawa w której jest dana ulotka</li>-->
<!--            <li>inna sprawa w której jest dana ulotka</li>-->
<!--        </ul>-->
<!--    </td>-->
<!--</tr>-->
</div>

</div>

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