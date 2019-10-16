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




<?php  

        $cod=$_GET['x'];
$Status=$_GET['Status'];

if ($Status=="INACTIVO") {
  //header('location:index.php');
   echo "<script>";
    echo "alert('CONSTANCIA YA ANULADA');";
    echo "window.location = 'index.php';";
    echo "</script>";
}

?>

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
  <form method="POST" class="">
      		 
      	
        


          <div class="form-group">
        
 <div class="form-group label-floating">
                        <label class="control-label">Ingrese El Motivo de Anulacion</label>
                        <input class="form-control" type="text" Id="motivo" name="motivo" Required onkeypress="return mCheck(event)" pattern="[A-Z 0-9 ]{6,250}" title="Unicamente Letras Mayusculas, Minimo 6 y Maximo 250" placeholder="Ingrese El Motivo de Anulacion">
                                 <script language="javascript"> 
                                    function mCheck(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                      if (key == 32) return true
                                     if (key > 64 && key < 91) {
                                       if (field.value == "") return true
                                       regexp = /.[A-Z]{5}$/
                                       return !(regexp.test(field.value))
                                        }
                                       if (key > 47 && key < 58) {
                                       if (field.value == "") return true
                                       regexp = /.[A-Z]{5}$/
                                       return !(regexp.test(field.value))
                                        }

                                     if (key == 46) {
                                        if (field.value == "") return false
                                        regexp = /^[A-Z]+$/
                                       return regexp.test(field.value)
                                     }
                                     return false
                                   }
                                  </script>  
                        </div>





          </div>

          <div>
            <?php 
            include('../crearConexionGECOMP.php');

            $DetalledeCons=mssql_query("SELECT * FROM CONSTANCIA_GENERADA WHERE Id_constancia='$cod' ");
            if ($ver=mssql_fetch_array($DetalledeCons)) {
             
               if ($ver['Tipo_Constancia']=="1") {
              $ver['Tipo_Constancia']="Constancia de trabajo Sin deducciones";
            }
            if ($ver['Tipo_Constancia']=="2") {
              $ver['Tipo_Constancia']="Constancia de trabajo con deducciones normal";
            }
          
            if ($ver['Tipo_Constancia']=="5") {
              $ver['Tipo_Constancia']="Constancia para Bono de 13AVO/14AVO";
            }
          
            if ($ver['Tipo_Constancia']=="7") {
              $ver['Tipo_Constancia']="Constancia para Bono de Vacaciones";
            }
            if ($ver['Tipo_Constancia']=="8") {
              $ver['Tipo_Constancia']="Constancia para Universidades";
            }
            if ($ver['Tipo_Constancia']=="9") {
              $ver['Tipo_Constancia']="Constancia para Embajadas/Consulados";
            }
            if ($ver['Tipo_Constancia']=="10") {
              $ver['Tipo_Constancia']="Constancia para T.S.C.";
            }
            if ($ver['Tipo_Constancia']=="11") {
              $ver['Tipo_Constancia']="Constancia de Cancelados";
            }

           

            $optenerNombre=mssql_query("SELECT NOMBRE_COOPERATIVA FROM COOPERATIVAS WHERE Id_Cooperativa=' ".$ver['Id_Constancia_Dirigida']." '");
            if ($Datos=mssql_fetch_array($optenerNombre)) {
              $ver['Id_Constancia_Dirigida']=$Datos['NOMBRE_COOPERATIVA'];
            }



            
            }

            ?>

            <table>
              <tr>
                <td>Nombre:</td>
                <td style="width: 10%"></td>
                <td><?php echo $ver['Nombre']." ".$ver['Apellido']; ?></td>
              </tr>
               <tr>
                <td>Dirigido a: </td>
                <td style="width: 10%"></td>
                <td><?php echo $ver['Id_Constancia_Dirigida']; ?></td>
              </tr>
               <tr>
                <td>Codigo del Empleado: </td>
                <td style="width: 10%"></td>
                <td><?php echo $ver['Codigo_Empleado']; ?></td>
              </tr>
              <tr>
                <td>Tipo de Constancia: </td>
                <td style="width: 10%"></td>
                <td><?php echo $ver['Tipo_Constancia']; ?></td>
              </tr>
               <tr>
                <td>Cargo: </td>
                <td style="width: 10%"></td>
                <td><?php echo $ver['Cargo']; ?></td>
              </tr>
               <tr>
                <td>Asignado a: </td>
                <td style="width: 10%"></td>
                <td><?php echo $ver['Asignado']; ?></td>
              </tr>
            </table>
          </div>


<div id="prove"></div>


            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="location.href='index.php'">Cancelar</button>
        <input type="submit" name="enviarDato" class="btn btn-primary" value="Aceptar">


      </div>


  </form>
      </div>



  
  
    </div>
  </div>
</div> 
<?php
 
	               if (isset($_POST['enviarDato'])) {
                 $variable= $_POST['motivo'];


                      include('../crearConexionGECOMP.php');
                       $us= $_SESSION['CodEmpleado'];
                   $res2=mssql_query("UPDATE CONSTANCIA_GENERADA SET Estado=0, Observacion='$variable', Usuario_Modifcacion='$us', Fecha_Modificacion=Getdate() WHERE Id_constancia='$cod'");
                                        if ($res2==true) {
                                        
                                            echo "<script> alert('Datos Almacenados con Exito'); </script>";
                                      
                                        }else{
                                          echo "<script> alert('Datos no Ingresados'); </script>";
                                        }

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