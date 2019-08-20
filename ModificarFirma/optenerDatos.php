<?php 
 session_start();
ob_start();
include('../crearConexionGECOMP.php');
 //$varsession= $_SESSION['username'];
 //if($varsession== null || $varsession= ''){
 // header("location:prueba.php");
 // die();
 //}
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

  <!-- SideBar -->
<section id="loadgif">
 <?php include '../Menu.php'; ?>

</section>

1




<body class="Fondo">

<section>
          <div class="center" style="background-color: #FFFFFFFF;">
          <form  method="post">
         <?php 
          $id=$_GET['x'];
$CTSD=0;
$CTCD=0;

$TRECAT_AVO=0;

$VAC=0;
$UNIVERSIDADES=0;
$EMBAJADAS=0;
$TSC=0;
$CANCELADOS=0;
          $SQL=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA ='$id'");
          if($ejecutar=mssql_fetch_array($SQL)){
            $ejecutar['NOMBRE_EMPLEADO'];
            $ejecutar['CTSD'];
            $ejecutar['CTCDN'];
      
            $ejecutar['TRECE_AVO'];
    
            $ejecutar['VAC'];
            $ejecutar['UNIVERSIDADES'];
            $ejecutar['EMBAJADAS'];
            $ejecutar['TSC'];
            $ejecutar['CANCELADOS'];
            if ($ejecutar['ESTATUS']==0) {
              echo "<strong>";
              echo "<script>";
            echo "alert('ERROR.. No puede Modificar este usuario!');";
            echo "window.location = 'index.php';";
            echo "</script>";
            echo "</strong>";
            }
            if ($ejecutar['CTSD']==1) {
              $CTSD=1;
            }
            if ($ejecutar['CTCDN']==1) {
              $CTCD=1;
            }
            
            if ($ejecutar['TRECE_AVO']==1) {
              $TRECAT_AVO=1;
            }
           
            if ($ejecutar['VAC']==1) {
              $VAC=1;
            }
            if ($ejecutar['UNIVERSIDADES']==1) {
              $UNIVERSIDADES=1;
            }
            if ($ejecutar['EMBAJADAS']==1) {
              $EMBAJADAS=1;
            }
            if ($ejecutar['TSC']==1) {
              $TSC=1;
            }
            if ($ejecutar['CANCELADOS']==1) {
              $CANCELADOS=1;
            }
          }
          ?>


              <h1 align="center" >DATOS DE FIRMA AUTORIZADA DE CONSTANCIAS</h1>
              <h1 align="center" ></h1>

                         <h1 class="negrita"><?php echo "Codigo del Empleado:\t".$ejecutar['CODIGO_EMPLEADO']; ?></h1>

                         <div class="form-group label-floating">
                        <label class="control-label">Ingrese el nombre Completo</label>
                        <input class="form-control" type="text" value="<?php echo $ejecutar['NOMBRE_EMPLEADO']; ?>" Id="Nombre" name="Nombre" Required onkeypress="return mCheck1(event)" attern="[A-Z ]{2,100}"  title="Unicamente letras mayusculas, minimo 15 y maximo 60" placeholder="Ingrese el Nombre Completo">
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
                        <label class="control-label">Ingrese El Puesto o Cargo</label>
                        <input class="form-control" type="text" Id="Puesto" value="<?php echo $ejecutar['PUESTO_EMPLEADO']; ?>" name="Puesto" Required placeholder="Ingrese la cantidad de meses de adelanto" min="1" max="12" onkeypress="return mCheck2(event)"  title="Unicamente Numeros, minimo 2 y maximo 100" placeholder="Ingrese El Puesto o Cargo">
                             <script language="javascript"> 
                                    function mCheck2(e, field) {
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



                            <div class="center" style="background-color: #FFFFFFFF;">
                              <h4 align="center" ><b>Seleccione Las Constancias que esta Autorizado a Firmar</b></h4>
                             <h4 align="center" ><b></b></h4>
        <input type="checkbox" name="CTSD" value="1" <?php if ($CTSD==1) {echo "checked";} ?>> Constancia de Trabajo sin Deducciones<br>
        <input type="checkbox" name="CTCD" value="1"<?php if ($CTCD==1) { echo "checked"; }  ?>>  Constancia de Trabajo con Deducciones Normal<br>
     
        <input type="checkbox" name="TRECAT_AVO" value="1"<?php if ($TRECAT_AVO==1) { echo "checked"; }  ?>>  Constancia para Bono de 13AVO/14AVO<br>
      
        <input type="checkbox" name="VAC" value="1"<?php if ($VAC==1) { echo "checked"; }  ?>> Constancia para Bono de Vacaciones<br>
        <input type="checkbox" name="UNIVERSIDADES" value="1"<?php if ($UNIVERSIDADES==1) { echo "checked"; }  ?>>  Constancia para Universidades<br>
        <input type="checkbox" name="EMBAJADAS" value="1"<?php if ($EMBAJADAS==1) { echo "checked"; }  ?>> Constancia para Embajadas/Consulados<br>
        <input type="checkbox" name="TSC" value="1"<?php if ($TSC==1) { echo "checked"; }  ?>> Constancia para T.S.C.<br>
        <input type="checkbox" name="CANCELADOS" value="1"<?php if ($CANCELADOS==1) { echo "checked"; }  ?>>  Constancia de Cancelados<br>
                             
                              

                               </div>
                          

                            <div class="">
                               <h4 align="center" ></h4>
                               <button type="submit" name="guardar" class="btn btn-info btn-xs btn-block" >Guardar</button>

                                     <?php
                                     if (isset($_POST['guardar'])) {
                                
                                   //$cEmpleado=utf8_decode($_POST['cEmpleado']);
                                   $Nombre=utf8_decode($_POST['Nombre']);
                                   $Puesto=utf8_decode($_POST['Puesto']);
                                   //$usuario=$_SESSION['logeo'];
                                        if (isset($_POST["CTSD"])) {
                                             $CTSD=1;
                                            } else {
                                               $CTSD=0;
                                                }
                                         if (isset($_POST["CTCD"])) {
                                             $CTCD=1;
                                            } else {
                                               $CTCD=0;
                                                }
                                     
                                                  if (isset($_POST["TRECAT_AVO"])) {
                                             $TRECAT_AVO=1;
                                            } else {
                                               $TRECAT_AVO=0;
                                                }
                                                  
                                                  if (isset($_POST["VAC"])) {
                                             $VAC=1;
                                            } else {
                                               $VAC=0;
                                                }
                                                  if (isset($_POST["UNIVERSIDADES"])) {
                                             $UNIVERSIDADES=1;
                                            } else {
                                               $UNIVERSIDADES=0;
                                                }
                                                  if (isset($_POST["EMBAJADAS"])) {
                                             $EMBAJADAS=1;
                                            } else {
                                               $EMBAJADAS=0;
                                                }
                                                  if (isset($_POST["TSC"])) {
                                             $TSC=1;
                                            } else {
                                               $TSC=0;
                                                }
                                                  if (isset($_POST["CANCELADOS"])) {
                                             $CANCELADOS=1;
                                            } else {
                                               $CANCELADOS=0;
                                                }

                                                $val= $_SESSION['CodEmpleado'];
                                
      $update=mssql_query("UPDATE FIRMA_CONSTANCIAS SET NOMBRE_EMPLEADO='$Nombre',PUESTO_EMPLEADO='$Puesto',CTSD='$CTSD',CTCDN='$CTCD', TRECE_AVO='$TRECAT_AVO', VAC='$VAC', UNIVERSIDADES='$UNIVERSIDADES', EMBAJADAS='$EMBAJADAS', TSC='$TSC', CANCELADOS='$CANCELADOS', USUARIO_MODIFICACION='$val',FECHA_MODIFICACION=getdate() WHERE Id_FIRMA='$id'");
                      if ($update==true) {
                                            echo "<script>";
                        echo "alert('DATOS ACTUALIZADOS CON EXITO!');";
                        echo "window.location = 'index.php';";
                        echo "</script>";
                          
                                        }else{
                                          echo "<script> alert('Datos no Ingresados'); </script>";
                                        }
                                         
                                       //header("location:Nuevacooperativa.php");
                                     }
                                     ?>

                                     </div> 


          </form>


      </div>
</section>
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
</body>
</html>