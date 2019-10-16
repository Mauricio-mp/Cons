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

<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
	 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


           
            
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
  <?php 
 if (isset($_POST['Aceptar'])) {
  $val=0;
$opcion=$_POST['opcion'];
$fechaInicioContrato=$_POST['fechaInicioContrato'];
$fechaFinalContrato=$_POST['fechaFinalContrato'];
$fechaInicioAcuerdo=$_POST['fechaInicioAcuerdo'];
$FechaFinalAcuerdo=$_POST['FechaFinalAcuerdo'];
$firma=$_POST['firma'];
$FechaRetiro=$_POST['FechaRetiro'];
$Resolucion=$_POST['Resolucion'];
$FechaResolucion=$_POST['FechaResolucion'];
$Autoriza=$_POST['Autoriza'];

if ($opcion=='') {
  $val=1;
  echo '
<div class="alert alert-warning" role="alert">
  <strong>ERROR..</strong> Selecciones tipo de constancia.
</div>
';
}

if ($firma=='') {
  $val=1;
  echo '
<div class="alert alert-warning" role="alert">
  <strong>ERROR..</strong> no ha seleccionado firma.
</div>
';
}
if ($fechaInicioContrato=='' && $fechaFinalContrato=='' && $fechaInicioAcuerdo=='' && $FechaFinalAcuerdo=='') {
  $val=1;
  echo '
<div class="alert alert-warning" role="alert">
  <strong>ERROR..</strong> Selecciones fechas de acuerdo o fechas de contrato.
</div>
';
}




if ($val==0) {
   if ($opcion==1) {


header("Location: DetalleConstanciaNormal.php?f_I_C=$fechaInicioContrato&f_F_C=$fechaFinalContrato&f_I_A=$fechaInicioAcuerdo&f_F_A=$FechaFinalAcuerdo&codigo=$CodigoEmpleado&firma=$firma"); 
 }

 if ($opcion==2) {
header("Location: DetalleConstanciaRetiro.php?f_I_C=$fechaInicioContrato&f_F_C=$fechaFinalContrato&f_I_A=$fechaInicioAcuerdo&f_F_A=$FechaFinalAcuerdo&codigo=$CodigoEmpleado&firma=$firma&FechaRetiro=$FechaRetiro&Resolucion=$Resolucion&FechaResolucion=$FechaResolucion&Autoriza=$Autoriza"); 
 }

  if ($opcion==3) {
header("Location: DetalleConstanciaRenuncia.php?f_I_C=$fechaInicioContrato&f_F_C=$fechaFinalContrato&f_I_A=$fechaInicioAcuerdo&f_F_A=$FechaFinalAcuerdo&codigo=$CodigoEmpleado&firma=$firma&FechaRetiro=$FechaRetiro&Resolucion=$Resolucion&FechaResolucion=$FechaResolucion&Autoriza=$Autoriza"); 
 }
}


 



}


  ?>
   <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Seleccine Tipo de Constancia</label>
    <div class="form-group">
      <select class="form-control" id="opcion" name="opcion" onChange="habilitar(this.form)">
      <option selected="selected" disabled>Seleccione su opcion.....</option> 
      <option value="1">Despido Normal</option>
      <option value="2">Retiro Voluntario</option>
      <option value="3">Renuncia</option>

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
    <label for="FechaRetiro">Fecha Retiro</label>
    <input type="date" class="form-control" id="FechaRetiro" name="FechaRetiro" placeholder="YYYY-mm-dd" disabled>
  </div>
   <div class="form-group">
    <label for="Resolucion">Resolucion</label>
    <input type="text" class="form-control" id="Resolucion" name="Resolucion" placeholder="ejemplo: FGA-XXX-XXXX" disabled>
  </div>
   <div class="form-group">
    <label for="Resolucion">Autoriza Retiro</label>
    <select class="form-control" id="Autoriza" name="Autoriza" disabled><option>Fiscal General</option><option>Fiscal Adjunto</option></select>
  </div>
    
  <div class="form-group">
    <label for="FechaRetiro">Fecha Resolucion</label>
  <div class='input-group date' id='datetimepicker1' >
    <input type='text' name="FechaResolucion" id="FechaResolucion" class="form-control" disabled >
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-calendar"></span>
   </span>
  </div>
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
       
  <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
  </script>




 

  

  <div style="text-align: center">
      <button type="submit" name="Aceptar" class="btn btn-primary">Submit</button>
  </div>

</form>

 </div>
 
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

     document.getElementById('FechaRetiro').disabled=true;
     document.getElementById('Resolucion').disabled=true;
     document.getElementById('FechaResolucion').disabled=true;
     document.getElementById('Autoriza').disabled=true;

    


     
   }
  if(form.opcion.options[2].selected)
  {
     document.getElementById('fechaInicioContrato').disabled=false;
     document.getElementById('fechaFinalContrato').disabled=false;
     document.getElementById('fechaInicioAcuerdo').disabled=false;
     document.getElementById('FechaFinalAcuerdo').disabled=false;
     document.getElementById('firma').disabled=false;

     document.getElementById('FechaRetiro').disabled=false;
     document.getElementById('Resolucion').disabled=false;
     document.getElementById('FechaResolucion').disabled=false;
     document.getElementById('Autoriza').disabled=false;

          document.getElementById('firma').required = true;
     document.getElementById('FechaRetiro').required = true;
     document.getElementById('Resolucion').required = true;
     document.getElementById('FechaResolucion').required = true;
     document.getElementById('Autoriza').required = true;
     




     
   }

    if(form.opcion.options[3].selected)
  {
     document.getElementById('fechaInicioContrato').disabled=false;
     document.getElementById('fechaFinalContrato').disabled=false;
     document.getElementById('fechaInicioAcuerdo').disabled=false;
     document.getElementById('FechaFinalAcuerdo').disabled=false;
     document.getElementById('firma').disabled=false;

     document.getElementById('FechaRetiro').disabled=false;
     document.getElementById('Resolucion').disabled=false;
     document.getElementById('FechaResolucion').disabled=false;
     document.getElementById('Autoriza').disabled=false;

     
     document.getElementById('firma').required = true;
     document.getElementById('FechaRetiro').required = true;
     document.getElementById('Resolucion').required = true;
     document.getElementById('FechaResolucion').required = true;
     document.getElementById('Autoriza').required = true;

     //document.getElementById("Resolucion").required = true;
     



     
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