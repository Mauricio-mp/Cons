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
    if (Verificar_Permisos( $val,26)== '0'){ 
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
  <?php include '../Menu1.php'; ?>


</section>
        


<body class="Fondo">
  <div class="modal fade" id="xls" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1> <?php  
        session_start();
        ob_start();

          $fechaminima=$_POST['fechaMinima'];
          $fechamaxima=$_POST['fechaMaxima'];
          $opcion=$_POST['opcion'];

       
         ?></h1>

      <div>
        <form method="POST" id="add_name">
          <div id="insert_data"></div>
          <div class="form-group">

            <table>
              <tbody>
                <tr>
                  <td style="padding-right:130px"><input type="checkbox" name="Datos[]" value="Nombre">
    <label class="form-check-label" for="exampleCheck1">Nombre</label></td>
                   <td style="padding-right:130px"><input type="checkbox"    name="Datos[]" value="sueldo">
    <label class="form-check-label" for="exampleCheck1">Sueldo</label></td>
                </tr>
                 <tr>
                  <td style="padding-right:130px"><input type="checkbox"    name="Datos[]" value="Apellido">
    <label class="form-check-label" for="exampleCheck1">Apellido</label></td>
                   <td style="padding-right:130px"><input type="checkbox"   name="Datos[]" value="Fecha_Modificacion">
    <label class="form-check-label" for="exampleCheck1">Fecha Modificacion</label></td>
                </tr>
                 <tr>
                  <td style="padding-right:130px"><input type="checkbox"   name="Datos[]" value="Codigo_Empleado">
    <label class="form-check-label" for="exampleCheck1">Codigo de Empleado</label></td>
                   <td style="padding-right:130px"><input type="checkbox"   name="Datos[]" value="Fecha_Creacion">
    <label class="form-check-label" for="exampleCheck1">Fecha de Emision</label></td>
                </tr>
                 <tr>
                   <td style="padding-right:120px"><input type="checkbox"   name="Datos[]" value="Usuario_Modifcacion">
    <label class="form-check-label" for="exampleCheck1">Usuario Modificacion</label></td>
                   <td><input type="checkbox"    name="Datos[]" value="Estado_Entrega">
    <label class="form-check-label" for="exampleCheck1">Estado de Entrega</label></td>
                </tr>
                 <tr>
                 <td style="padding-right:120px"><input type="checkbox"   name="Datos[]" value="Comentario_Entrega">
    <label class="form-check-label" for="exampleCheck1">Comentario de entrega</label></td>
                  <td style="padding-right:120px"><input type="checkbox"   name="Datos[]" value="Observacion">
    <label class="form-check-label" for="exampleCheck1">Observacion Anul.</label></td>
                </tr>
                <tr>
                  <td style="padding-right:120px"><input type="checkbox"   name="Datos[]" value="Tipo_Constancia">
    <label class="form-check-label" for="exampleCheck1">Tipo de Constancia</label></td>
    <td style="padding-right:120px"><input type="checkbox"   name="Datos[]" value="Estado">
    <label class="form-check-label" for="exampleCheck1">Estado (A/I)</label></td>
                </tr>
               
              </tbody>
            </table>
             <div class="form-check">
     
            </div>


   <div >Elementos seleccionados <span ><strong id="str"></strong></span></div>
  </div>     
      </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" onclick="myFunction()" class="btn btn-primary">si</button>
        <?php 
        if (isset($_POST['si'])) {
          
          $uuu=$_POST['Datos'];
     
       header('location:excelEspecifico.php?x='.json_encode($uuu).'&y='.$Opcion.'  ');
        }
        
         ?>

      </div>
      <script>
function myFunction() {


  
  var fechaminima='<?php echo $fechaminima; ?>'
  var fechamaxima='<?php echo $fechamaxima; ?>'
  var opcion='<?php echo $opcion; ?>'


      
    var arr = $('[name="Datos[]"]:checked').map(function(){
      return this.value;
    }).get();

    if(arr==''){
    alert('DEBE SELECCINAR FILAS');
   }else{
    var str = arr.join(',');
    
    var array=JSON.stringify(arr);
  
   $('#str').text(str);


  




window.location = 'excelEspecifico.php?final='+fechamaxima+'&inicio='+fechaminima+'&opcion='+opcion+'&x='+array;
   }
    
    
}
$('[name="Datos[]"]').click(function() {
      
    var arr = $('[name="Datos[]"]:checked').map(function(){
      return this.value;
    }).get();
    
    var str = arr.join(',');
    
    $('#arr').text(JSON.stringify(arr));
    
    $('#str').text(str);
    var contar =arr.length;

    if (contar>6) {
      alert('solo pude seleccionar 6 filas');

    }


  
  });
</script>


         </form>
    </div>
  </div>
</div> 
<div class="" style="margin-left:10em; margin-right:10em">
<section style="background-color: #F9FAFA;">
  <div class="center container">
    <form method="POST" >
      <div  class="form-group">
        <label>Elija el tipo de Constancia</label>
        <select class="form-control" name="opcion">
          <option selected="selected">Seleccione su opcion.....</option> 
          <option value="12">Todas</option>
          <option value="1">Constancia de trabajo Sin deducciones</option>
          <option value="2">Constancia de trabajo con deducciones normal</option>
          <option value="3">Constancia de Trabajo con Deducciones con Plus</option>
          <option value="4">Constancia de Trabajo con Deducciones sin Plus</option>
          <option value="5">Constancia para Bono de 13AVO</option>
          <option value="6">Constancia para Bono de 14AVO</option>
          <option value="7">Constancia para Bono de Vacaciones</option>
          <option value="8">Constancia para Universidades</option>
          <option value="9">Constancia para Embajadas/Consulados</option>
          <option value="10">Constancia para T.S.C.</option>
          <option value="11">Constancia de Cancelados</option>

        </select>
      </div>

      <div  class="form-group">
        <label>Seleccione fecha Minima</label>
        <input type="date" class="form-control" name="fechaMinima">

      </div>

      <div  class="form-group">
        <label>Seleccione fecha Maxima</label>
         <input type="date" class="form-control" name="fechaMaxima">
      </div>
      
      <div style="text-align: center" class="form-group"> 
        <button type="text" name="BtnAceptar" class="btn btn-primary" style="padding-left:80px;padding-right:80px  ">Aceptar</button>
      </div>
    </form>
      

  </div>


</section>

</div>
<div style="background-color:#FFF;">
  
   <div id="example_wrapper" class="dataTables_wrapper table-responsive">
  
   <table id="myexample" class="display nowrap dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
      <thead class="bg-gray">
        <tr role="row">
            <th style="text-align: center">Tipo de Constancia</th>
            <th style="text-align: center">Codigo de Empleado</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Apellido</th>
            <th style="text-align: center">Estado de Entrega</th>
            <th style="text-align: center">Codigo Generado</th>
            <th style="text-align: center">Sueldo</th>
            <th style="text-align: center">Estado</th>
            <th style="text-align: center">Dirigida a:</th>
            <th style="text-align: center">Observacion</th>
            <th style="text-align: center">Fecha de Creacion</th>
            <th style="text-align: center">Usuario de Creacion</th>
            <th style="text-align: center">Fecha de Modificacion</th>
            <th style="text-align: center">Usuario de Modificacion</th>
            <th style="text-align: center">Usuario de Entrega</th>
            <th style="text-align: center">Fecha de Entrega</th>
            

            
         </tr>
      </thead>
      
      <tbody>
 
          <?php 
   if (isset($_POST['BtnAceptar'])) {
         $fechaMinima=$_POST['fechaMinima'];
          $fechaMaxima=$_POST['fechaMaxima'];
          $Opcion=$_POST['opcion'];

        
     include('../crearConexionGECOMP.php');
        


          echo '<div class="row">
        <div class="col text-center">
          <a href="#"  data-toggle="modal" data-target="#xls">
            Generar XLS Especifico
          </a>

        </div>
      </div>';  
        echo '<div class="row">
        <div class="col text-center">
          <a href="excel.php?x='.$Opcion.'&fecha1='.$fechaMinima.'&fecha2='.$fechaMaxima.'">
            Generar XLS General
          </a>
        </div>
      </div>';          

          if ($Opcion=="Seleccione su opcion....." || $Opcion =="") {
             echo "<script>";
    echo "alert('Seleccione una Opcion');";
    echo "window.location = 'index.php';";
    echo "</script>";
          }

          if (strtotime($fechaMaxima) < strtotime($fechaMinima)) {
             echo "<script>";
    echo "alert('ASEGURESE QUE LAS FECHAS 


    -ESTEN CORRECTAS');";
    echo "window.location = 'index.php';";
    echo "</script>";
          }



          if ($Opcion==12) {
          $consultar=mssql_query("SELECT * FROM CONSTANCIA_GENERADA WHERE Fecha_Creacion between '$fechaMinima' and '$fechaMaxima'");
             }else{
              $consultar=mssql_query("SELECT * FROM CONSTANCIA_GENERADA WHERE Fecha_Creacion between ' $fechaMinima' and '$fechaMaxima' AND Tipo_Constancia='$Opcion'");

             }
          while ($fila=mssql_fetch_array($consultar)) {
            $fila['Tipo_Constancia'];
            if ($fila['Tipo_Constancia']=="1") {
              $fila['Tipo_Constancia']="Constancia de trabajo Sin deducciones";
            }
            if ($fila['Tipo_Constancia']=="2") {
              $fila['Tipo_Constancia']="Constancia de trabajo con deducciones normal";
            }
            if ($fila['Tipo_Constancia']=="3") {
              $fila['Tipo_Constancia']="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila['Tipo_Constancia']=="4") {
              $fila['Tipo_Constancia']="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila['Tipo_Constancia']=="5") {
              $fila['Tipo_Constancia']="Constancia para Bono de 13AVO-14VO";
            }
           
            if ($fila['Tipo_Constancia']=="7") {
              $fila['Tipo_Constancia']="Constancia para Bono de Vacaciones";
            }
            if ($fila['Tipo_Constancia']=="8") {
              $fila['Tipo_Constancia']="Constancia para Universidades";
            }
            if ($fila['Tipo_Constancia']=="9") {
              $fila['Tipo_Constancia']="Constancia para Embajadas/Consulados";
            }
            if ($fila['Tipo_Constancia']=="10") {
              $fila['Tipo_Constancia']="Constancia para T.S.C.";
            }
            if ($fila['Tipo_Constancia']=="11") {
              $fila['Tipo_Constancia']="Constancia de Cancelados";
            }

            if (empty($fila['Fecha_Modificacion'])) {
              $fila['Fecha_Modificacion']="No hay Modificaciones";
            }

            if (empty($fila['Usuario_Modifcacion'])) {
              $fila['Usuario_Modifcacion']="No hay Modificaciones";
            }

            if (empty($fila['Observacion'])) {
              $fila['Observacion']="No hay Observaciones";
            }

            if ($fila['Estado']=="1") {
              $fila['Estado']="ACTIVO";
              $Color="rgba(245, 252, 251,0.8)";


            }
            if ($fila['Estado']=="0") {
              $fila['Estado']="INACTIVO";
              $Color="rgba(243, 105, 61,0.8)";
              
            }

            $fecha=date("Y/m/d", strtotime($fila['Fecha_Creacion']));

            if ($fila['Estado_Entrega']==1) {
              $fila['Estado_Entrega']="Pendiente";
            }
             if ($fila['Estado_Entrega']==0) {
              $fila['Estado_Entrega']="Entregado";
            }

            if ( $fila['Fecha_Entrega']=='') {
              $fila['Fecha_Entrega']="No hay fecha de entrega";
            }else{
              $fila['Fecha_Entrega']=date('d/m/Y', strtotime($fila['Fecha_Entrega']));
            }

            if ($fila['Usuario_Entrega']=='') {
              $fila['Usuario_Entrega']="sin usuario de entrega";
            }
            
            $bono=$fila['Id_Constancia_Dirigida'];

            $optenerNombre=mssql_query("SELECT NOMBRE_COOPERATIVA FROM COOPERATIVAS WHERE Id_Cooperativa='$bono'");
            if ($Datos=mssql_fetch_array($optenerNombre)) {
              $fila['Id_Constancia_Dirigida']=$Datos['NOMBRE_COOPERATIVA'];
            }
            if ($fila['Id_Constancia_Dirigida']=='') {
               $fila['Id_Constancia_Dirigida']="Sin Consignar ";
            }
  
           ?>
           <tr>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Tipo_Constancia'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Codigo_Empleado'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo utf8_encode($fila['Nombre']);?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo utf8_encode($fila['Apellido'])?></td>

             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Estado_Entrega'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['cPeriodo'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['sueldo'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Estado'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Id_Constancia_Dirigida'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo utf8_encode($fila['Observacion']);?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fecha;?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Usuario_Creacion'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Fecha_Modificacion'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Usuario_Modifcacion'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Usuario_Entrega'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Fecha_Entrega'];?></td>

             

           </tr>

           <?php 
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
        // $("#myexample > tbody").append('<tr><td scope="col" colspan="13" rowspan="1">Rozwiniecie / dodanie dodatkowej tresci</td></tr>');
        
        $("#updated_contacts").append($(".addElement span").clone());        
    

    });
    
});
   </script>

<!--<tr class="add-here">-->

<!--</tr>-->
<!--<tr class="add-hiere">-->
<!--    <td colspan="13">-->
<!--        <ul>-->
<!--            <li>Sprawa w kt�rej jest dana ulotka</li>-->
<!--            <li>inna sprawa w kt�rej jest dana ulotka</li>-->
<!--        </ul>-->
<!--    </td>-->
<!--</tr>-->
</div>

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
    
    <p style="color: white">Copyright &copy Site Name 2019. Ministerio P�blico.</p>
  </footer>
</body>
</html>