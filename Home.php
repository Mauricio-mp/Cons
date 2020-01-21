<?php 
session_start();
ob_start();

//include('crearConexionGECOMP.php');


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
<body class="Fondo">
	<!-- SideBar -->
<section id="loadgif">
 <?php include('menu.php'); ?>


</section>
<section>
	
<div class="container">
  <div class="center">
    <h1 class="centrarTexto">Sistema de Generación de constancias del Ministerio Público (GECOMP)</h1>
    <img src="img/9.png" style=" width:100%;">

    

    <p style="font-size: 20px; text-align: center;font-weight: bold; margin-top: 3em;">Misión</p>
 <p class="parrafo">Ser un organismo Constitucional independiente, que representa, defiende y protege los intereses generales de la sociedad hondureña, dirigiendo en forma técnico jurídica la investigación de los delitos, ejerciendo la acción penal publica y sus demás funciones, sobre la base de la unidad de actuaciones y la dependencia jerárquica, con profesionalismo, objetividad, legalidad, autonomía funcional y administrativa, con absoluto respeto a la Constitución, convenciones internacionales y las leyes nacionales, fortaleciendo el Estado de Derecho.</p>

    <p style="font-size: 20px; text-align: center;font-weight: bold; margin-top: 3em; ">Visión</p>
 <p class="parrafo">Ser una Institución Pública consolidada, moderna y tecnificada,
        de reconocido prestigio, confianza y liderazgo en el ejercicio de
        la acción penal pública, con credibilidad, transparencia y libre
        de toda injerencia político-sectaria; logrando de esta manera
        el cumplimiento de sus fines, con personal altamente formado,
        comprometido con la Institución y la sociedad, de sólidos valores
        morales y éticos.</p>
     </div>


</div>

</section>
 
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
  <footer style="background-color:#011D30;padding: 20px;text-align: center">
    
    <p style="color: white">Copyright &copy Site Name 2019. Ministerio Público.</p>
  </footer>
 
</body>

</html>
