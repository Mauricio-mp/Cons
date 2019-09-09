<?php 
 session_start();
ob_start();
include('crearConexionGECOMP.php');
include('Permisos.php');
 $varsession= $_SESSION['username'];
 $val= $_SESSION['CodEmpleado'];
 
 if($varsession== null || $varsession= ''){
   echo "<script>";
    echo "alert('inicie session');";
    echo "window.location = './index.php';";
    echo "</script>";

  die();
 }

 //valida permisos
    if (Verificar_Permisos( $val,13)== '0'){ 
       echo "<script>";
       echo "alert('Usted no Cuenta con el Permiso para Ingresar a esta opcion.');";
       echo "window.location = './Home.php';";
       echo "</script>";
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
            <link rel="stylesheet" href="estilos.css">
            
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">

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
 <?php include('menu.php'); ?>


</section>

<body style="background-color:#00FFFFFF">

<section>
          <div class="center" style="background-color: #FFFFFFFF;">
        	<form  Id="add_name" name="add_name" method="post">
         


              <h1 align="center" >MODIFICAR COOPERATIVA</h1>

                           <?php
                         
                            $Id = $_GET['x'];

                $COLOR="#FFFFFF";
                $result1= mssql_query("SELECT Id_Cooperativa, SIGLAS_COOPERATIVA, NOMBRE_COOPERATIVA, MESES_ADELANTO, VAC, TRECE_AVO, CATORCE_AVO, ESTATUS FROM COOPERATIVAS WHERE Id_Cooperativa= '$Id'");     
                     while($row = mssql_fetch_array($result1)){
                      $id = $row[0];
                       $siglas = $row[1];
                        $nombrec = $row[2];
                         $meses = $row[3];
                          $vac = $row[4];
                            $treceavo = $row[5];
                              $catorceavo = $row[6];
                                $estado = $row[7];
                   
                }     
                
                           ?>







                          <div class="form-group label-floating">
                        <label class="control-label">Siglas de la Cooperativa</label>
                        <input class="form-control" type="text" Id="siglas" name="siglas" value="<?php echo $siglas;?>" Required onkeypress="return mCheck(event)" pattern="[A-Z.]{2,20}" title="Unicamente letras mayusculas, minimo 2 y maximo 20" placeholder="Siglas de la Cooperativa">
                                 <script language="javascript"> 
                                    function mCheck(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                      // if (key == 32) return true
                                     if (key > 64 && key < 91) {
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

                         <div class="form-group label-floating">
                        <label class="control-label">Nombre Cooperativa</label>
                        <input class="form-control" type="text" Id="nombrec" name="nombrec" value="<?php echo $nombrec;?>" Required onkeypress="return mCheck1(event)" pattern="[A-Z ]{15,100}" title="Unicamente letras mayusculas, minimo 15 y maximo 100" placeholder="Nombre de la Cooperativa">
                                 <script language="javascript"> 
                                    function mCheck1(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                      if (key == 32) return true
                                     if (key > 64 && key < 91) {
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

                          <div class="form-group label-floating">
                        <label class="control-label">Meses de adelanto</label>
                        <input class="form-control" type="number" Id="meses" name="meses" value="<?php echo $meses;?>" Required placeholder="Ingrese la cantidad de meses de adelanto" min="1" max="12" onkeypress="return mCheck2(event)" pattern="[0-9]{1,2}" title="Unicamente Numeros, minimo 1 y maximo 12" placeholder="Meses de adelanto">
                              <script language="javascript"> 
                                    function mCheck2(e, field) {
                                     key = e.keyCode ? e.keyCode : e.which
                                     if (key == 8) return true
                                    //  if (key == 32) return true
                                     if (key > 47 && key < 58) {
                                       if (field.value == "") return true
                                       regexp = /.[0-9]{5}$/
                                       return !(regexp.test(field.value))
                                                                      }
                                  
                                     return false
                                   }
                                  </script>  
                        </div>

                            <div class="center" style="background-color: #FFFFFFFF;">
                              <h4 align="center" ><b>Selecciones los bonos que esta cooperativa ofrece</b></h4>
                             
                          <input type="checkbox" name="cvac" <?php if($vac == 1) echo'checked="checked"'?> value="1"  > Vacaciones<br>
                            <input type="checkbox" name="c13avo" <?php if($treceavo == 1) echo'checked="checked"'?> value="1">  Trece Avo<br>
                              <input type="checkbox" name="c14avo" <?php if($catorceavo == 1) echo'checked="checked"'?> value="1"> Catorce Avo<br>
                              

                               </div>
                          
                                 <div class="">
                               <h4 align="center" ></h4>
                                    <?php
                                if ($estado ==1) {
                                             $palabra="DESACTIVAR";
                                              $valor=0;
                                            } else {
                                               $palabra="ACTIVAR";
                                                $valor=1;
                                                }


                                                ?>
                               <button type="submit" name="Activar1" class="<?php if($palabra=="DESACTIVAR"){ echo "btn btn-danger btn-xs btn-block"; } else{ echo "btn btn-info btn-xs btn-block"; } ?>" ><?php echo $palabra?></button>
                                         <?php
                                     if (isset($_POST['Activar1'])) {
                                
                                  
                                            $cod= $_SESSION['CodEmpleado'];
                                       $res2=mssql_query("UPDATE COOPERATIVAS SET ESTATUS='$valor', USUARIO_MODIFICACION='$cod', FECHA_MODIFICACION=Getdate() WHERE Id_Cooperativa='$id'");
                                        if ($res2==true) {
                                          echo "<script> alert('Datos Almacenados con Exito'); </script>";
                                        }else{
                                          echo "<script> alert('Datos no Ingresados'); </script>";
                                        }

                                         
                                       //header("location:Nuevacooperativa.php");


                                     }
                                     ?>




                                </div> 



                            <div class="">
                               <h4 align="center" ></h4>
                               <button type="button" name="guardar55" id="guardar55" class="btn btn-info btn-xs btn-block" >MODIFICAR</button>
                              <div id="insert_data">

                                        </div>

                                     </div> 


<script>
$(document).ready(function(){

  
  $('#guardar55').click(function(){    
    $.ajax({
      url:"modal.php",
      method:"POST",
      data:$('#add_name').serialize(),
      success:function(data)
      {
       $('#insert_data').html(data);

      } 
    });
  });
  
});
</script>





          </form>


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
</body>
</html>