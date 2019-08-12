<?php 
 session_start();
ob_start();
include('../crearConexionVam.php');
 $varsession= $_SESSION['username'];
 $Codigo_Empleado=$_SESSION['logeo'];
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
          <li><a tabindex="-1" href="../Cons_Sin_Ded">Sin Deducciones</a></li>
                       <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">Con Deducciones<span class="caret"></span></a>
                       <ul class="dropdown-menu">
                         <li><a tabindex="-1" href="../Cons_Con_Ded">Normal</a></li>
                           <li><a tabindex="-1" href="../Cons_Con_Plus">Con Plus</a></li>
                        </ul>
                      </li>
        </ul>
      </li>
            <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Bonos<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#"   data-toggle="modal" data-target="#nuevoPorcentaje">13AVO</a></li>
          <li><a tabindex="-1" href="Porcentaje.php">14AVO</a></li>
           <li><a tabindex="-1" href="Porcentaje.php">Vacaciones</a></li>
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
                 <li><a tabindex="-1" href="../ModificarFirma">Modificar</a></li>
                  </ul>
                 </li>

                 
                
                 <li><a tabindex="-1" href="../Nuevaembajada.php">Nueva Embajada o Consulado</a></li>
                  <li><a tabindex="-1" href="../Nuevaembajada.php">Anular Constancias</a></li>

                   <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Constancia T.S.C<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="../Mant_Acuerdo">Acuerdo</a></li>
                 <li><a tabindex="-1" href="../Mant_Acuerdo/excel.php">Modificar</a></li>
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
<div class="modal fade" id="nuevoPorcentaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button onclick="location.href='cerrarSesion.php'" type="button" class="btn btn-primary">si</button>
      </div>
    </div>
  </div>
</div> 





<!-- modal de Nuevo Porcentaje de Retencion-->


</section>
 <div class="container">
    <div class="center" style="border: 1px solid black;">
       <div style="background-color:#FFF;">
       <h1 align="center" style="font-family:Arial, Helvetica, sans-serif;">Mantenimiento Deducciones</h1>
    </div>
    </div>
    
 
</div>
        

<body class="Fondo">
<div class="" style="margin-left:10em; margin-right:10em">
<section style="background-color: #F9FAFA;">
  <div class="center container">

    <form method="POST" >
    <div style="background-color:#FFF;">
    	<table id="" class="table table-striped table-bordered" style="width:100%">
      <thead class="bg-gray">
       <tr role="row">
       <th style="text-align: left">Codigo de Constancia</th>
           <th style="text-align: left">Tipo de Constancia</th>
           <th style="text-align: left">Permanetes</th>
           <th style="text-align: left">Temporales</th>

          <!-- <th style="text-align: center;padding-left: 50px;padding-right: 50px ">Nombre</th>
           <th style="text-align: center;padding-left: 50px;padding-right: 50px">Apellido</th>
           <th style="text-align: center;padding-left: 60px;padding-right: 60px ">Cargo</th>
           <th style="text-align: center;padding-left: 60px;padding-right: 60px ">Asignado</th> -->


        </tr>
     </thead>
     
     <tbody>
       <?php 
       include('../crearConexionVam.php');
       $conslutaIngreso=mssql_query("SELECT *  FROM  prdedu order by cdescript");
       while($fila=mssql_fetch_array($conslutaIngreso)){
       	$ConversionMin=strtolower($fila['cdescript']);
       	$fila['cdescript']=ucwords($ConversionMin);
       	$numerodeingreso=$fila['cdedcode'];



	   include('../crearConexionGECOMP.php');
       	$Checkear=mssql_query("SELECT * FROM  DEDUCCION_DEDUCCIONES WHERE CODIGO_DEDUCCION='$numerodeingreso' and PERMANENTE=1");
       	if ($checkear1=mssql_fetch_array($Checkear)) {
       		$checkear1['CODIGO_DEDUCCION'];
       	}

       	if ($checkear1['CODIGO_DEDUCCION']==$numerodeingreso) {
       		$checked="checked";
       	}else{
       		$checked="";
       	}

       		$Vertemporal=mssql_query("SELECT * FROM  DEDUCCION_DEDUCCIONES WHERE CODIGO_DEDUCCION='$numerodeingreso' and TEMPORAL=1");
       	if ($ejeucutar=mssql_fetch_array($Vertemporal)) {
       		$ejeucutar['CODIGO_DEDUCCION'];
       	}

       	if ($ejeucutar['CODIGO_DEDUCCION']==$numerodeingreso) {
       		$Checked="checked";
       	}else{
       		$Checked="";
       	}

       
       
       ?>

       
          <tr>
          <td style="text-align: left; background-color:"><?php echo utf8_encode($fila['cdedcode']); ?></td>
            <td style="text-align: left; background-color:"><?php echo utf8_encode($fila['cdescript']); ?></td>
            <td style="text-align: center; background-color:"><input type="checkbox" value="<?php echo utf8_encode($fila['cdedcode']); ?>" name="prmanentes[]" <?php echo $checked;?>></td>
            <td style="text-align: center; background-color:"><input type="checkbox" value="<?php echo utf8_encode($fila['cdedcode']); ?>" name="Temporales[]" <?php echo $Checked;?> ></td>


          </tr>
<?php
}
?>
          
    </tbody>
    </table>

    <script type="text/javascript">
    	$(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
  
 

</div>
 <div style="text-align: center" class="form-group"> 
        <button type="text" name="BtnAceptar" class="btn btn-primary" style="padding-left:80px;padding-right:80px  ">Aceptar</button>
</div>
   
   <?php
   if(isset($_POST['BtnAceptar'])){
   	$val=0;
     $permanentes= $_POST['prmanentes'];
     $Temporales= $_POST['Temporales'];
   

$PER = count($_POST["prmanentes"]);
$TEMP = count($_POST["Temporales"]);

include('../crearConexionGECOMP.php');
$borraTabla=mssql_query("DELETE FROM DEDUCCION_DEDUCCIONES");
if($TEMP >0)
{
	for($i=0; $i<$TEMP; $i++)
  {
  	  if(trim($_POST["prmanentes"][$i]) == trim($_POST["Temporales"][$i]))
    {

     // echo "<script>alert(' Campos iguales');</script>";
    	$val=2;

      
    }else{
    	$temporales_clean=addslashes($_POST["Temporales"][$i]);

  	include('../crearConexionVam.php');
  	$verdetalleDeduccion=mssql_query("SELECT *  FROM  prdedu WHERE cdedcode='$temporales_clean'");
    	if ($verdetalleDeduccion1=mssql_fetch_array($verdetalleDeduccion)) {
    		$Des=$verdetalleDeduccion1['cdescript'];

    		//echo $Desc."</br>";
    		$n1=1;
    		$n2=0;

    	}


    	include('../crearConexionGECOMP.php');
    	$insert2=mssql_query("INSERT INTO DEDUCCION_DEDUCCIONES(CODIGO_DEDUCCION,DESCRIPCION,TEMPORAL,PERMANENTE,USUARIO_CREACION,FECHA_CREACION) VALUES ('$temporales_clean','$Des','$n1','$n2','$Codigo_Empleado',GETDATE())");
    }

  	
  }

  if ($insert2==true) {
  	$val=1;
  }
}



if($PER >0)
{
  


  for($i=0; $i<$PER; $i++)
  {

    if(trim($_POST["prmanentes"][$i]) == trim($_POST["Temporales"][$i]))
    {

      //echo "<script>alert(' Campos iguales');</script>";
    	$val=2;

      
    }else{


    	$permanente_clean=addslashes($_POST["prmanentes"][$i]);

      include('../crearConexionVam.php');

      $verdetalleingreso=mssql_query("SELECT *  FROM  prdedu WHERE cdedcode='$permanente_clean'");
    	if ($verdetalleingreso1=mssql_fetch_array($verdetalleingreso)) {
    		$Desc=$verdetalleingreso1['cdescript'];

    		//echo $Desc."</br>";
    		$numero1=0;
    		$numero2=1;

    	}

    	

    	

    	include('../crearConexionGECOMP.php');
    	$insert1=mssql_query("INSERT INTO DEDUCCION_DEDUCCIONES(CODIGO_DEDUCCION,DESCRIPCION,TEMPORAL,PERMANENTE,USUARIO_CREACION,FECHA_CREACION) VALUES ('$permanente_clean','$Desc','$numero1','$numero2','$Codigo_Empleado',GETDATE())");

     
    }


  }

   if ($insert1==true) {
  	$val=1;
  }
 

  
}else{
	echo "<script>alert('Campos Vacios');</script>";
}

if($val==1){
	echo "<script>";
    echo "alert('Datos Insertados Correctament');";
    echo "window.location = '../Man_Cons_Con/deducciones.php';";
    echo "</script>";


	//echo "<script>alert('Datos Insertados Correctamente');</script>";
}

if($val==2){
	echo "<script>alert(' Campos iguales');</script>";
}


   }
   ?>
    </form>
  </div>


</section>

</div>


	<!-- Content page-->



	<!-- Notifications area -->
	

	<!-- Dialog help -->
	 

	
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