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
 <?php include '../Menu1.php'; ?>


</section>
</head>
<body>
 <div class=" center" >

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
    <input class="btn btn-raised btn-alert" disabled="true" type="button" id="Guardar" name='Guardar'  value="Guardar" style="margin-left:5%;" >
    
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
 </div>




   <?php  
                         
    
     
        //cargamos el archivo al servidor con el mismo nombre
        //solo le agregue el sufijo bak_ 
      //  echo '<table border="1" class="table">';

       $archivo = $_FILES['excel']['name'];
            $tipo = $_FILES['excel']['type'];
            $destino = "cop_".$archivo;//Le agregamos un prefijo para identificarlo el archivo cargado
            if (copy($_FILES['excel']['tmp_name'],$destino));
            else echo "";
 
            if (file_exists ("cop_".$archivo)){ 
            /** Llamamos las clases necesarias PHPEcel */
            require_once('../Classes/PHPExcel.php');
            //require_once('../Classes/PHPExcel/Reader/Excel2007.php'); 
            // Cargando la hoja de excel
            $objReader = new PHPExcel_Reader_Excel2007();
            $objPHPExcel = $objReader->load("cop_".$archivo);
            $objFecha = new PHPExcel_Shared_Date();       
            // Asignamon la hoja de excel activa
            $objPHPExcel->setActiveSheetIndex(0);

            $filas=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

            
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();


//echo  $highestRow;

            

            //require_once 'PHPExcel/Classes/PHPExcel.php';


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
<style> 
 .table_wrapper{
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
</style>
<div style="background-color:white; margin-top:20px ">
<div class="table_wrapper">
<table id="myexample" class="display nowrap dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
  <thead>
  <tr>
          <th style="text-align: center">#</th>
          <th style="text-align: center">Codigo de Empleado</th>
           <th style="text-align: center" >Proveniente</th>
           <th style="text-align: center">Lugar</th>
           <th style="text-align: center">Nombre</th>
           <th style="text-align: center">Identidad</th>
           <th style="text-align: center">Puesto</th>
           <th style="text-align: center">departamento</th>
           <th style="text-align: center">Sueldo</th>
           <th style="text-align: center">caja Chica</th>
           <th style="text-align: center">Pago plus</th>
           <th style="text-align: center">Zonaje Plus</th>
           <th style="text-align: center">Zonaje</th>
           <th style="text-align: center">Rotatorio</th>
           <th style="text-align: center">Combustible</th>
           
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
                             

                          

       
   	                          	

                              for ($row = 1; $row <= $highestRow; $row++){ 
                                  $Contador=$Contador+1;
                                   $Color="";
                            
                         
                            $_DATOS_EXCEL[$i]['Nombre'] =  $sheet->getCell("A".$row)->getValue();
                            $CodigoEmpleados=$_DATOS_EXCEL[$i]['Nombre'];
                            $arrCod[]=$CodigoEmpleados;

                           

                            $_DATOS_EXCEL[$i]['Proveniente'] = $sheet->getCell("B".$row)->getValue();
                            $Proveniente=$_DATOS_EXCEL[$i]['Proveniente'];
                            $arrProv[]=$Proveniente;

                            $_DATOS_EXCEL[$i]['Lugar'] = $sheet->getCell("C".$row)->getValue();
                            $Lugar=$_DATOS_EXCEL[$i]['Lugar'];
                            $arrLugar[]=$Lugar;

                            $_DATOS_EXCEL[$i]['Nombre'] = $sheet->getCell("D".$row)->getValue();
                            $Nombre=$_DATOS_EXCEL[$i]['Nombre'];
                            $arrNombre=$Nombre;

                            $_DATOS_EXCEL[$i]['Identidad'] = $sheet->getCell("E".$row)->getValue();
                            $Identidad=$_DATOS_EXCEL[$i]['Identidad'];
                            $arrIdenti[]=$Identidad;

                            $_DATOS_EXCEL[$i]['Puesto'] = $sheet->getCell("G".$row)->getValue();
                            $Puesto=$_DATOS_EXCEL[$i]['Puesto'];
                            $arrPuesto[]=$Puesto;

                            $_DATOS_EXCEL[$i]['Departamento'] = $sheet->getCell("H".$row)->getValue();
                            $Departamento=$_DATOS_EXCEL[$i]['Departamento'];
                            $arrDepto[]=$Departamento;

                            $_DATOS_EXCEL[$i]['Sueldo'] = $sheet->getCell("I".$row)->getValue();
                            $Sueldo=$_DATOS_EXCEL[$i]['Sueldo'];

                            $arrSueldo[]=$Sueldo;

                            $_DATOS_EXCEL[$i]['CajaChica'] = $sheet->getCell("J".$row)->getValue();
                            $CajaChica=$_DATOS_EXCEL[$i]['CajaChica'];

                            $arrCajaChica[]=$CajaChica;

                            $_DATOS_EXCEL[$i]['PagoPlus'] = $sheet->getCell("K".$row)->getValue();
                            $PagoPlus=$_DATOS_EXCEL[$i]['PagoPlus'];
                            $arrPago[]=$PagoPlus;

                            $_DATOS_EXCEL[$i]['ZonajePlus'] = $sheet->getCell("L".$row)->getValue();
                            $ZonajePlus=$_DATOS_EXCEL[$i]['ZonajePlus'];
                            $arrZonajePlus[]=$ZonajePlus;

                            $_DATOS_EXCEL[$i]['Zonaje'] = $sheet->getCell("M".$row)->getValue();
                            $Zonaje=$_DATOS_EXCEL[$i]['Zonaje'];
                            $arrZonaje[]=$Zonaje;

                            $_DATOS_EXCEL[$i]['Rotatorio'] = $sheet->getCell("N".$row)->getValue();
                            $Rotatorio=$_DATOS_EXCEL[$i]['Rotatorio'];
                            $arrRotatorio[]=$Rotatorio;


                            $_DATOS_EXCEL[$i]['Combustible'] = $sheet->getCell("O".$row)->getValue();
                            $Combustible=$_DATOS_EXCEL[$i]['Combustible'];
                            $arrCombus[]=$Combustible;


                          

                           

                           
                            
                        


                             if (trim($CodigoEmpleados)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($Proveniente)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($Lugar)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($Nombre)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($Identidad)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($Puesto)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($Departamento)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                              if (trim($Sueldo)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($CajaChica)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($PagoPlus)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($ZonajePlus)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($Zonaje)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }
                             if (trim($Rotatorio)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }

                             if (trim($Combustible)=='') {
                              $Errores=$Errores+1;
                              $Color=$Rojo;
                              $val=1;
                               
                             }






                             

                              echo '
                              <tr>
                              
                              <td style="background-color:'.$Color.'">'.$Contador.'</td>
                              <td style="background-color:'.$Color.'">'.$CodigoEmpleados.'</td>
                              <td style="background-color:'.$Color.'">'.$Proveniente.'</td>
                              <td style="background-color:'.$Color.'">'.$Lugar.'</td>
                              <td style="background-color:'.$Color.'">'.$Nombre.'</td>
                              <td style="background-color:'.$Color.'">'.$Identidad.'</td>
                              <td style="background-color:'.$Color.'">&nbsp;'.$Puesto.'</td>
                              <td style="background-color:'.$Color.'">&nbsp;'.$Departamento.'</td>
                              <td style="background-color:'.$Color.'">&nbsp;'.$Sueldo.'</td>
                              <td style="background-color:'.$Color.'">&nbsp;'.$CajaChica.'</td>
                              <td style="background-color:'.$Color.'">&nbsp;'.$PagoPlus.'</td>
                              <td style="background-color:'.$Color.'">&nbsp;'.$ZonajePlus.'</td>
                              <td style="background-color:'.$Color.'">&nbsp;'.$Zonaje.'</td>
                              <td style="background-color:'.$Color.'">&nbsp;'.$Rotatorio.'</td>
                              <td style="background-color:'.$Color.'">&nbsp;'.$Combustible.'</td>

              

                            

                              </tr>
                              ';




                             
                                }

                              
                            



                           }
                                
                           
                          ?> 
 
      </tbody>
 
  
</table>
</div>
</div>


<div class="form-control" >



 <div  > 
 
    


   
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



$( "#Guardar" ).click(function() {




var arrayCodigo=<?php echo json_encode($arrCod);?>;
var arrProv=<?php echo json_encode($arrProv);?>;
var arrLugar=<?php echo json_encode($arrLugar);?>;
var arrNombre=<?php echo json_encode($arrNombre);?>;
var arrIdenti=<?php echo json_encode($arrIdenti);?>;
var arrPuesto=<?php echo json_encode($arrPuesto);?>;
var arrDepto=<?php echo json_encode($arrDepto);?>;
var arrSueldo=<?php echo json_encode($arrSueldo);?>;
var arrCajaChica=<?php echo json_encode($arrCajaChica);?>;
var arrPago=<?php echo json_encode($arrPago);?>;
var arrZonajePlus=<?php echo json_encode($arrZonajePlus);?>;
var arrZonaje=<?php echo json_encode($arrZonaje);?>;
var arrRotatorio=<?php echo json_encode($arrRotatorio);?>;
var arrCombus=<?php echo json_encode($arrCombus);?>;



console.log(arrZonajePlus.length); 
$.post( "functions.php", { Codigo: arrayCodigo,Proveniente:arrProv,Lufar:arrLugar,Nombre:arrNombre,Identidad:arrIdenti,puesto:arrPuesto,Departamento:arrDepto,sueldo:arrSueldo,cajachica:arrCajaChica,Pagoplus:arrPago,ZonajePlus:arrZonajePlus,Zonaje:arrZonaje,Rotatirio:arrRotatorio,Combustible:arrCombus })
  .done(function( data ) {
  
    console.log(data); 
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




</div>
    
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
     document.getElementById('Guardar').disabled=true;
</script>
  ";
}elseif($val==0){
  echo "
<script>
     document.getElementById('Guardar').disabled=false;
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