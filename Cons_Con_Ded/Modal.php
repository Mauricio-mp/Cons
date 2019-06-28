<!DOCTYPE html>
<html>
<head>
	


	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  


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
<body>
	<script>
      $(document).ready(function()
      {
         $("#miModal").modal("show");
      });
    </script>
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">


      </div>
      <div class="modal-body">
      	<form method="POST">
      		 
      	
        

         <?php 
         include('../crearConexionVam.php');

        $nombre=$_GET['x'];
        

         ?>
         <label>Seleccione mes a Generar</label>
<select class="form-control" name="opcionMes" id="opcionMes"><option  disabled selected>Seleccionar Opcion</option>
  <?php
  $formato=date('Y-m');
$nuevafecha = strtotime ( '-1 month' , strtotime ( $formato ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );
// echo $nuevafecha;
$optenerFechas1=mssql_query("SELECT DISTINCT cpayno  FROM prmisd  WHERE CONVERT(VARCHAR(25), tmodrec, 126) LIKE '$formato%' ORDER BY cpayno");
while($Fechas4=mssql_fetch_array($optenerFechas1)){
  echo "<option>".$Fechas4['cpayno']."</option>";
}
  ?>
  <?php
$optenerFechas=mssql_query("SELECT DISTINCT cpayno  FROM prmisd  WHERE CONVERT(VARCHAR(25), tmodrec, 126) LIKE '$nuevafecha%' ORDER BY cpayno");
while($Fechas=mssql_fetch_array($optenerFechas)){
  echo "<option>".$Fechas['cpayno']."</option>";
}
  ?>
  
</select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="location.href='index.php'">Cancelar</button>
        <input type="submit" name="enviarDato" class="btn btn-primary" value="Aceptar">
      </div>
      </form>
    </div>
  </div>
</div> 
<?php
	if (isset($_POST['enviarDato'])) {
		$opcion=$_POST['opcionMes'];
		# code...
		header('Location: DetalleConstancias.php?x='.$nombre.'&opcion='.$opcion.'');
	}
  ?>
</body>
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
</html>