<?php 
 session_start();
ob_start();
include('../crearConexionVam.php');
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
    if (Verificar_Permisos( $val,28)== '0'){ 
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
        


<body class="Fondo">
<div class="" style="margin-left:10em; margin-right:10em">
<section style="background-color: #F9FAFA;">
  <div class=" container">
    <h1 class="centrartitulo">Detalle de Constancias</h1>
    <form method="POST" >
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
 <?php 
 $cons1=0;
      $cons2=0;
      $cons7=0;
      $cons9=0;
      $cons=0;
  if (isset($_POST['BtnAceptar'])) {
    include('ConversionFecha.php');
    include('../crearConexionGECOMP.php');
      $fechaminima=$_POST['fechaMinima'];
      $fechaMaxima=$_POST['fechaMaxima'];

      $dia1 = date("d", strtotime($fechaminima));
      $mes1 = date("m", strtotime($fechaminima));
      $year1 = date("Y", strtotime($fechaminima));


      $dia2 = date("d", strtotime($fechaMaxima));
      $mes2 = date("m", strtotime($fechaMaxima));
      $year2 = date("Y", strtotime($fechaMaxima));

      $fecha1=fecha($dia1,$mes1,$year1);
      $fecha2=fecha($dia2,$mes2,$year2);
      echo "<h3>"."Resultados desde el ".$fecha1." hasta el ".$fecha2."</h3>";
      
      //constsncias de Trabajo sin deducciones
        $consultarConstancia1=mssql_query("SELECT count(*) AS cons1 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=1 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");

      $optenerCons1 = mssql_fetch_array($consultarConstancia1);
      $cons1 = $optenerCons1['cons1'];
     // echo "Constancia de trabajo Sin deducciones:"." ".$cons1;

       //constsncias de Trabajo sin deducciones
        $consultarConstancia2=mssql_query("SELECT count(*) AS cons2 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=2 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons2 = mssql_fetch_array($consultarConstancia2);
      $cons2 = $optenerCons2['cons2'];
      //echo "Constancia de trabajo Con deducciones Normal:"." ".$cons2;

       //constsncias de Trabajo sin deducciones
        $consultarConstancia7=mssql_query("SELECT count(*) AS cons7 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=7 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons7 = mssql_fetch_array($consultarConstancia7);
      $cons7 = $optenerCons7['cons7'];
     // echo "Constancia para Bono de Vacaciones:"." ".$cons7;

       //constsncias de Trabajo sin deducciones
        $consultarConstancia9=mssql_query("SELECT count(*) AS cons9 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=9 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons9 = mssql_fetch_array($consultarConstancia9);
      $cons9 = $optenerCons9['cons9'];
      //echo "Constancia para Embajadas/Consulados:"." ".$cons9;

       //constsncias de Trabajo sin deducciones


     
      $suma= $cons1+$cons2+$cons7+$cons9;
      $cons = $suma;

  }
   ?>


  

     <div id="example_wrapper" class="dataTables_wrapper table-responsive">
      <table style="width: 100%" class="table table-striped">
        <thead class="thead-dark">
        <tr role="row">
            <th style="text-align: center">DETALLE DE CONSTANCIAS</th>


         </tr>
      </thead>
       <tbody>
         <tr>


            <td>Constancia de trabajo Sin deducciones</td>
            <td><?php echo $cons1;?></td>


           </tr>
            <tr>



             <td >Constancia de trabajo Con deducciones Normal</td>
             <td><?php echo $cons2;?></td>


           </tr>
            <tr>



             <td >Constancia para Bono de Vacaciones</td>
             <td><?php echo $cons7;?></td>


           </tr>
            <tr>



             <td >Constancia para Embajadas/Consulados</td>
             <td><?php echo $cons9;?></td>

           </tr>
            <tr>



             <td>Total Constancias</td>
             <td><?php echo $cons;?></td>

           </tr>
       </tbody>

      </table>


<div>

</div>
   
     </div>



</section>


</div>

<div>
 

<div class="center container">
    
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