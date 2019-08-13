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
  	<?php echo  $nombre;?>
    <form method="POST" >
      
      <div  class="form-group">
        <label>Nombre Acuerdo</label>
        <input type="text" class="form-control" name="Nombre" placeholder="Ejemplo: FGR-000-0000">

      </div>

      <div  class="form-group">
        <label>Seleccione fecha Inicio</label>
         <input type="date" class="form-control" name="fechaInicial">
      </div>
      <div  class="form-group">
        <label>Seleccione fecha Efectiva</label>
         <input type="date" class="form-control" name="fechaEfectiva">
      </div>
      
      <div style="text-align: center" class="form-group"> 
        <button type="text" name="BtnAceptar" class="btn btn-primary" style="padding-left:80px;padding-right:80px  ">Aceptar</button>
      </div>
    </form>
  </div>
<?php 
if (isset($_POST['BtnAceptar'])) {
	$nombre=$_POST['Nombre'];
	$fechaInicial=$_POST['fechaInicial'];
	$fechaEfectiva=$_POST['fechaEfectiva'];
	$codigoUsuario=$_SESSION['logeo'];

include('../crearConexionGECOMP.php');

	if (trim($nombre)=='' || trim($fechaInicial)=='' || trim($fechaEfectiva)=='') {
		echo '<h1 style="background-color:#E8888F;text-align:center" ">No deje campos vacios</h1>';
	}else{
		$acualizarEstadp=mssql_query("UPDATE Carta_Constancia SET Estado=0");
	$Insertar=mssql_query("INSERT INTO Carta_Constancia(Nombre_Acuerdo,Fecha_Inicial,Fecha_Efectivo,Estado,Usuario_Creacion,Fecha_Creacion) VALUES('$nombre','$fechaInicial,','$fechaEfectiva',1,'$codigoUsuario',GETDATE())");

	if ($Insertar==true) {
		echo '<h1 style="background-color:#5FCD97;text-align:center" ">Datos guardados con exito</h1>';
	}
	}
	
}
?>

</section>

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