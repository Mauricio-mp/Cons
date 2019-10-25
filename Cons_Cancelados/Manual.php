<?php 
 session_start();
ob_start();


 $varsession= $_SESSION['username'];
 $codigo=$_GET['x'];
 if($varsession== null || $varsession= ''){
   echo "<script>";
    echo "alert('inicie session');";
    echo "window.location = '../index.php';";
    echo "</script>";

  die();
 }

 //valida permisos
 include('../Permisos.php');
$val1= $_SESSION['CodEmpleado'];
    if (Verificar_Permisos( $val1,11)== '0'){ 
       echo "<script>";
       echo "alert('Usted no Cuenta con el Permiso para Ingresar a esta opcion.');";
       echo "window.location = './Home.php';";
       echo "</script>";
    } 


    include('../crearConexionVam.php');
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

    <?php include '../Menu1.php'; ?>


</section>
<body class="Fondo">
 

 <div class="container" style="background-color: #F9FAFA; border: 1px solid #555;">

  <h1 style="text-align: center">Constancia de Cancelados</h1>
   
 </div>
    

<section class="container" style="background-color: #F9FAFA; border: 1px solid #555;">
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">AVISO!</h4>
  <p>EL empleado seleccionado se encuentra en un estado inactivo, usted debera tener en cuenta que dicho empleado puede estar suspendido por gose de licencias, vacaciones o que ha sido cancelado pero no esta concluido como "Cancelado" .</p>
  <hr>
  <p class="mb-0">Para proceder a generar esta constancia usted debe estar consiente que dicho empleado aun no esta cancelado.</p>
</div
	 <div style="text-align:center">             
     <form method="POST" >
      
      <div  class="form-group">
        <label>Ingrese fecha de Cancelacion</label>
        <input type="date" class="form-control" id="Nombre" placeholder="Ejemplo: FGR-000-0000">

      </div>
      <div class="text-center">
      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="validar();"style="padding-left:80px;padding-right:80px  ">Aceptar</span> 
      
</button> 

      
</div>
<h2 style="color:red" id="cont1"></h2>
   
    </form>
                       
    </div>  
    <script>
        function validar() {
            var fecha = document.getElementById('Nombre').value;
            if (fecha==''){
                document.getElementById('cont1').innerHTML='debe ingresar fecha';
            }else{
                window.location = 'DetalleConstanciaManual.php?x=<?php echo $codigo; ?>&fecha='+fecha;
            }
           
}
    
    
    </script>
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