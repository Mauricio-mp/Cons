<!DOCTYPE html>
<html>
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
<section id="loadgif">
 <?php include '../Menu.php'; ?>


</section>
</head>
<body>
 <div class="container center" >

<form name="importa" method="post" action=""  enctype="multipart/form-data" class="container">
   <h2 style="text-align:center">Seleciones el Archivo a Importar</h2>
  

  
<?php 
$opcion=1;
 ?>
 <script>
  $(document).ready(function(){
   var val= document.getElementById('excel').value;
  $('#excel').change('keyup', function(){
   
    if (val=="") {
      document.getElementById('enviar').disabled=false;
    }
  })
  }); 
 </script>
  



 
  <div class="form-group">
  <label class="control-label">Archivo en excel</label>
  <div>
  <input type="text" name="libro" id="libro"  readonly="" class="form-control" placeholder="Seleccione Excel Formato .xlsx" >
  <input type="file"  id="excel" name="excel" >
  </div>
  <div id="result"></div>
  </div>
  <div> 



     <div style="text-align: center">
    <input class="btn btn-raised btn-alert" disabled="true" type="submit" id="enviar" name='enviar'  value="Importar" style="margin-left:5%">
    <input class="btn btn-raised btn-alert"  type="submit" id="Guardar" name='Guardar'  value="Guardar" style="margin-left:5%">
    <button type="button" id="subir" name="subir"  disabled="true" class="btn btn-raised btn-alert" data-dismiss="modal" style="margin-left:5%" ><i class="zmdi zmdi-upload"></i>  subir</button> 
  </div>
 
   
    

    <div id="subir"></div>
    </div>

    <div id="resp"></div>
    <div id="op"></div>
    <div class="loader"></div>
    <style type="text/css">
      .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('../Imagenes/Cargando.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
    </style>
    <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>

 
 </form>



   <?php  
                         
    
     
        //cargamos el archivo al servidor con el mismo nombre
        //solo le agregue el sufijo bak_ 
        echo '<table border="1" class="table">';
 
       $archivo = $_FILES['excel']['name'];
            $tipo = $_FILES['excel']['type'];
            $destino = "cop_".$archivo;//Le agregamos un prefijo para identificarlo el archivo cargado
            if (copy($_FILES['excel']['tmp_name'],$destino));
            else echo "";
 
            if (file_exists ("cop_".$archivo)){ 
            /** Llamamos las clases necesarias PHPEcel */
            require_once('../Classes/PHPExcel.php');
            require_once('../Classes/PHPExcel/Reader/Excel2007.php'); 
            // Cargando la hoja de excel
            $objReader = new PHPExcel_Reader_Excel2007();
            $objPHPExcel = $objReader->load("cop_".$archivo);
            $objFecha = new PHPExcel_Shared_Date();       
            // Asignamon la hoja de excel activa
            $objPHPExcel->setActiveSheetIndex(0);

            $filas=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

            //conectamos con la base de datos 
            // Llenamos el arreglo con los datos  del archivo xlsx
            
            
        }
        //si por algo no cargo el archivo bak_ 
        else {
            //echo "Necesitas primero importar el archivo";
        }
        $errores = 0;
        //recorremos el arreglo multidimensional 
        //para ir recuperando los datos obtenidos
        //del excel e ir insertandolos en la BD
      
        /*  include('conexion.php');
            foreach ($_DATOS_EXCEL as $campo => $valor) {
            $sql = "INSERT INTO Excel_insersion VALUES ('";
            foreach ($valor as $campo2 => $valor2) {
                $campo2 == "deduccionCodigo" ? $sql.= $valor2 . "');" : $sql.= $valor2 . "','";
            }
            echo $sql;

            $result = sqlsrv_query($conn,$sql);
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }
        }*/
        
        
///////////////////////////////////////////////////////////////////////// 

        //una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
        unlink($destino);

                   
                    
   
    ?>  
      <div id="example_wrapper" class="dataTables_wrapper">
  
   <table id="myexample" class="display nowrap dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
      <thead class="bg-gray">
        <tr role="row">
           <th>Codigo de Empleado</th>
            <th>Codigo de Empleado</th>
            <th>Sueldo</th>
            <th>Caja Chica</th>
            <th>Sueldo plus</th>
            <th>Zonaje plus</th>
            <th>Zonaje </th>
            <th>Fondo Reintegrable</th>
            <th>Fondo de combustible</th>



 
         </tr>
      </thead>
      
      <tbody>
      	<?php  
                          $proveedor='';
                          $Color="";
                          include('../crearConexionGECOMP.php');
                          include('Validaciones.php');
                          $Contador=0;
                          $Rojo="rgba(243, 105, 61,0.8)";
                          $val=0;
                          $Errores=0;

                            session_start();
							ob_start();
 							$varsession= $_SESSION['logeo'];
                            extract($_POST);
                             if (isset($_POST['enviar'])) {
                             



                              //$EliminarTabla=mssql_query("DELETE FROM DeduccionesEnero1");
   	                          	

                                for ($i = 1; $i <=$filas; $i++) {
                                  $Contador=$Contador+1;
                                   $Color="";
                            
                            $_DATOS_EXCEL[$i]['Empleado'] = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                            $empleado=$_DATOS_EXCEL[$i]['Empleado'];


                             $_DATOS_EXCEL[$i]['NOmbre'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                             $Salario= $_DATOS_EXCEL[$i]['NOmbre'];
                            
                             $_DATOS_EXCEL[$i]['Identidad'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                             $Caja_Chica= $_DATOS_EXCEL[$i]['Identidad'];

                             $_DATOS_EXCEL[$i]['DeduccionCodigo'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                             $Plus= $_DATOS_EXCEL[$i]['DeduccionCodigo'];

                             $_DATOS_EXCEL[$i]['Puesto'] = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                             $Zonaje_Plus= $_DATOS_EXCEL[$i]['Puesto'];

                              $_DATOS_EXCEL[$i]['Departamento'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                              $Zonaje= $_DATOS_EXCEL[$i]['Departamento'];

                              $_DATOS_EXCEL[$i]['Salario'] = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                              $Fondo_Reint= $_DATOS_EXCEL[$i]['Salario'];

                             $_DATOS_EXCEL[$i]['CajaChica'] = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
                             $Fondo_Combus= $_DATOS_EXCEL[$i]['CajaChica'];

                             if (trim($empleado)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                              if (is_numeric($empleado)==false) {
                              $Color=$Rojo;
                              $val=1;
                              $Errores=$Errores+1;
                               
                             }

                               if (is_numeric($Salario)==false) {
                              $Color=$Rojo;
                              $val=1;
                              $Errores=$Errores+1;
                               
                             }

                              if (is_numeric($Salario)==false) {
                                $Color=$Rojo;
                              $val=1;
                              $Errores=$Errores+1;
                               
                             }
                              if (is_numeric($Caja_Chica)==false) {
                                $Color=$Rojo;
                              $val=1;
                              $Errores=$Errores+1;
                               
                             }
                              if (is_numeric($Plus)==false) {
                                $Color=$Rojo;
                              $val=1;
                              $Errores=$Errores+1;
                               
                             }
                              if (is_numeric($Zonaje_Plus)==false) {
                                $Color=$Rojo;
                              $val=1;
                              $Errores=$Errores+1;
                               
                             }
                              if (is_numeric($Zonaje)==false) {
                                $Color=$Rojo;
                              $val=1;
                              $Errores=$Errores+1;
                               
                             }
                              if (is_numeric($Fondo_Reint)==false) {
                                $Color=$Rojo;
                              $val=1;
                              $Errores=$Errores+1;
                               
                             }
                              if (is_numeric($Fondo_Combus)==false) {
                                $Color=$Rojo;
                              $val=1;
                              $Errores=$Errores+1;
                               
                             }

                              echo '
                              <tr>
                              <td style="background-color:'.$Color.'">'.$Contador.'</td>
                              <td style="background-color:'.$Color.'">'.$empleado.'</td>
                              <td style="background-color:'.$Color.'">'.$Salario.'</td>
                              <td style="background-color:'.$Color.'">'.$Caja_Chica.'</td>
                              <td style="background-color:'.$Color.'">'.$Plus.'</td>
                              <td style="background-color:'.$Color.'">'.$Zonaje_Plus.'</td>
                              <td style="background-color:'.$Color.'">'.$Zonaje.'</td>
                              <td style="background-color:'.$Color.'">'.$Fondo_Reint.'</td>
                              <td style="background-color:'.$Color.'">'.$Fondo_Combus.'</td>

                              </tr>
                              ';




                             
                                }

                                if ($val==0) {
                                  include('../crearConexionGECOMP.php');
                                  $actualizar=mssql_query("UPDATE Base_Constancia SET Estado=0 WHERE Estado=1");
                                  foreach ($_DATOS_EXCEL as $valor) {
                                    $empleado= $valor['Empleado'];
                                    $Salario= $valor['NOmbre'];
                                    $Caja_Chica= $valor['Identidad'];
                                    $Plus= $valor['DeduccionCodigo'];
                                    $Zonaje_Plus= $valor['Puesto'];
                                    $Zonaje= $valor['Departamento'];
                                    $Fondo_Reint= $valor['Salario'];
                                    $Fondo_Combus= $valor['CajaChica'];

                                    $insertar=mssql_query("INSERT INTO Base_Constancia(Base_Empledo,Salario,Caja_Chica,Plus,Zonaje_Plus,Zonaje,Fondo_Reint,Fondo_Combus,Estado)VALUES('$empleado','$Salario','$Caja_Chica','$Plus','$Zonaje_Plus','$Zonaje','$Fondo_Reint','$Fondo_Combus',1)");
                                    

                                  }
                                  if ($insertar==true) {
                                    echo "<script>alert('Datos insertados con exito');</script>";
                                  }
                                 
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

<?php


  ?>



<?php 
if ($val==1) {
  echo "<div class=\"alert alert-danger\" style='margin-right:40em;'>
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  <strong>¡Error!</strong> Verifique que el archivo en excel tenga los datos correctos, Se encontraron ".$Errores." Errores.
</div>";


 echo "
<script>
     document.getElementById('subir').disabled=true;
</script>
  ";
}



 ?> 

      
          
        

</div>
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