<?php 
 session_start();
ob_start();

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
    if (Verificar_Permisos( $val,24)== '0'){ 
       echo "<script>";
       echo "alert('Usted no Cuenta con el Permiso para Ingresar a esta opcion.');";
       echo "window.location = '../Home.php';";
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
 <?php include '../Menu.php'; ?>


</section>
        
  <div class="container">
    <div class="center" style="border: 1px solid black;">
       <div style="background-color:#FFF;">
       <h1 align="center" style="font-family:Arial, Helvetica, sans-serif;">Mantenimiento Ingresos</h1>
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
       $conslutaIngreso=mssql_query("SELECT *  FROM  prpayc order by cdesc");
       while($fila=mssql_fetch_array($conslutaIngreso)){
       	$ConversionMin=strtolower($fila['cdesc']);
       	$fila['cdesc']=ucwords($ConversionMin);
       	$numerodeingreso=$fila['cpaycode'];



	   include('../crearConexionGECOMP.php');
       	$Checkear=mssql_query("SELECT * FROM  DEDUCCION_INGRESO WHERE CODIGO_INGRESO='$numerodeingreso' and PERMANENTE=1");
       	if ($checkear1=mssql_fetch_array($Checkear)) {
       		$checkear1['CODIGO_INGRESO'];
       	}

       	if ($checkear1['CODIGO_INGRESO']==$numerodeingreso) {
       		$checked="checked";
       	}else{
       		$checked="";
       	}

       		$Vertemporal=mssql_query("SELECT * FROM  DEDUCCION_INGRESO WHERE CODIGO_INGRESO='$numerodeingreso' and TEMPORAL=1");
       	if ($ejeucutar=mssql_fetch_array($Vertemporal)) {
       		$ejeucutar['CODIGO_INGRESO'];
       	}

       	if ($ejeucutar['CODIGO_INGRESO']==$numerodeingreso) {
       		$Checked="checked";
       	}else{
       		$Checked="";
       	}

       
       
       ?>

       
          <tr>
          <td style="text-align: left; background-color:"><?php echo utf8_encode($fila['cpaycode']); ?></td>
            <td style="text-align: left; background-color:"><?php echo utf8_encode($fila['cdesc']); ?></td>
            <td style="text-align: center; background-color:"><input type="checkbox" value="<?php echo utf8_encode($fila['cpaycode']); ?>" name="prmanentes[]" <?php echo $checked;?>  ></td>
            <td style="text-align: center; background-color:"><input type="checkbox" value="<?php echo utf8_encode($fila['cpaycode']); ?>" name="Temporales[]" <?php echo $Checked;?> ></td>


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
$borraTabla=mssql_query("DELETE FROM DEDUCCION_INGRESO");
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
  	$verdetalleDeduccion=mssql_query("SELECT *  FROM  prpayc WHERE cpaycode='$temporales_clean'");
    	if ($verdetalleDeduccion1=mssql_fetch_array($verdetalleDeduccion)) {
    		$Des=$verdetalleDeduccion1['cdesc'];

    		//echo $Desc."</br>";
    		$n1=1;
    		$n2=0;

    	}


    	include('../crearConexionGECOMP.php');
    	$insert2=mssql_query("INSERT INTO DEDUCCION_INGRESO(CODIGO_INGRESO,DESCRIPCION,TEMPORAL,PERMANENTE,USUARIO_CREACION,FECHA_CREACION) VALUES ('$temporales_clean','$Des','$n1','$n2','$Codigo_Empleado',GETDATE())");
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

      $verdetalleingreso=mssql_query("SELECT *  FROM  prpayc WHERE cpaycode='$permanente_clean'");
    	if ($verdetalleingreso1=mssql_fetch_array($verdetalleingreso)) {
    		$Desc=$verdetalleingreso1['cdesc'];

    		//echo $Desc."</br>";
    		$numero1=0;
    		$numero2=1;

    	}

    	

    	

    	include('../crearConexionGECOMP.php');
    	$insert1=mssql_query("INSERT INTO DEDUCCION_INGRESO(CODIGO_INGRESO,DESCRIPCION,TEMPORAL,PERMANENTE,USUARIO_CREACION,FECHA_CREACION) VALUES ('$permanente_clean','$Desc','$numero1','$numero2','$Codigo_Empleado',GETDATE())");

     
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
    echo "window.location = '../Man_Cons_Con';";
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