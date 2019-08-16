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
$status=$_GET['Status'];
$CodigoEmpleado=$_GET['x'];

if ($status=='A' || $status=='I') {
   echo "<script>";
    echo "alert('SOLO EMPLEADOS CANCELADOS');";
    echo "window.location = 'index.php';";
    echo "</script>";}

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

 <div class="container" style="background-color: #F9FAFA; border: 1px solid #555;">

  <h1 style="text-align: center">Constancia de Cancelados</h1>
 </div>

 <div class="container" style="background-color: #F9FAFA; border: 1px solid #555;">
   <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Seleccine Tipo de Constancia</label>
    <div class="form-group">
      <select class="form-control" id="opcion" name="opcion" onChange="habilitar(this.form)">
      <option selected="selected" disabled>Seleccione su opcion.....</option> 
      <option>Despido Normal</option>
      <option>Retiro Voluntario</option>
      <option>Despido en periodo de prueba</option>

    </select>
    </div>
   
    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Inico Contrato</label>
    <input type="date" class="form-control" id="fechaInicioContrato" name="fechaInicioContrato" placeholder="YYYY-mm-dd" disabled>
  </div>
 <div class="form-group">
    <label for="exampleInputPassword2">Fin del Contrato</label>
    <input type="date" class="form-control" id="fechaFinalContrato" name="fechaFinalContrato" placeholder="YYYY-mm-dd" disabled>
  </div>

   <div class="form-group">
    <label for="exampleInputPassword3">Inicio Acuerdo</label>
    <input type="date" class="form-control" id="fechaInicioAcuerdo" name="fechaInicioAcuerdo" placeholder="YYYY-mm-dd" disabled>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword3">Fin de Acuerdo</label>
    <input type="date" class="form-control" id="FechaFinalAcuerdo" name="FechaFinalAcuerdo" placeholder="YYYY-mm-dd" disabled>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword3">Firma Constancia</label>
    <select class="form-control"  id="firma" name="firma" disabled>
      <option selected="selected" disabled>Seleccione firma.....</option> 
      <?php 
      include('../crearConexionGECOMP.php');
      $consulta=mssql_query('SELECT * FROM FIRMA_CONSTANCIAS WHERE CANCELADOS=1');
      while($fila=mssql_fetch_array($consulta)) {
        echo '<option value="'.$fila['Id_FIRMA'].'">'.$fila['NOMBRE_EMPLEADO'].'</option>';
      }

       ?>

    </select>
  </div>

 

  

  <div style="text-align: center">
      <button type="submit" name="Aceptar" class="btn btn-primary">Submit</button>
  </div>

</form>

 </div>
 <?php 
 if (isset($_POST['Aceptar'])) {
   # code...
 
$fechaInicioContrato=$_POST['fechaInicioContrato'];
$fechaFinalContrato=$_POST['fechaFinalContrato'];
$fechaInicioAcuerdo=$_POST['fechaInicioAcuerdo'];
$FechaFinalAcuerdo=$_POST['FechaFinalAcuerdo'];
$firma=$_POST['firma'];

header("Location: DetalleConstancia.php?f_I_C=$fechaInicioContrato&f_F_C=$fechaFinalContrato&f_I_A=$fechaInicioAcuerdo&f_F_A=$FechaFinalAcuerdo&codigo=$CodigoEmpleado&firma=$firma"); 


}


  ?>
 <script type="text/javascript">
    
function habilitar(form)
{
if(form.opcion.options[1].selected)
  {
     document.getElementById('fechaInicioContrato').disabled=false;
     document.getElementById('fechaFinalContrato').disabled=false;
     document.getElementById('fechaInicioAcuerdo').disabled=false;
     document.getElementById('FechaFinalAcuerdo').disabled=false;
     document.getElementById('firma').disabled=false;


     
   }

}
  </script>
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