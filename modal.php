<?php 
 session_start();
ob_start();
include('crearConexionGECOMP.php');
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
  <link rel="stylesheet" href="css/estilos.css">

</head>

 
<section id="loadgif">


<!-- modal de Nuevo -->


<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GECOMP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
        <h1> ¿Desea Modificar Datos?</h1>
         <form method="POST" >

 

        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        <button name="si1" type="submit" class="btn btn-primary ">si</button>
     <?php

                                    $nombre1=utf8_decode($_POST['nombrec']);
                                   $meses1=utf8_decode($_POST['meses']);
                                    $siglas1=utf8_decode($_POST['siglas']);
                                    echo $siglas1;


   //$usuario=$_SESSION['logeo'];

                                        if (isset($_POST["cvac"])) {
                                             $cvac1=1;
                                            } else {
                                               $cvac1=0;
                                                }
                                         if (isset($_POST["c13avo"])) {
                                             $c13avo1=1;
                                            } else {
                                               $c13avo1=0;
                                                }
                                          if (isset($_POST["c14avo"])) {
                                             $c14avo1=1;
                                            } else {
                                               $c14avo1=0;
                                                }



        if (isset($_POST['si1'])) {
                                   
                     
                                                    echo "<script> alert('Datos Almacenados con Exito'); </script>";
                                


                                       $res11=mssql_query("UPDATE COOPERATIVAS SET SIGLAS_COOPERATIVA='$siglas1', NOMBRE_COOPERATIVA='$nombre1', MESES_ADELANTO='$meses1', VAC='$cvac1', TRECE_AVO='$c13avo1', CATORCE_AVO='$c14avo1', USUARIO_MODIFICACION='006351' , FECHA_MODIFICACION=Getdate() WHERE Id_Cooperativa='4'");
                                        if ($res11==true) {
                                      echo "<script> alert('Datos Almacenados con Exito'); </script>";
                                     //    echo "<div class=\"alert alert-success\">
                      //  <strong>COMPROBANTE DE RETENCION ACTIVO!</strong> no ha sido anulado.
                     // </div>";
                                      //  }else{
                                        // echo "<script> alert('Datos no Ingresados'); </script>";

                                       
                                                                                
                                    //  header("location:Modificarcooperativa.php?x=$id");
             
                                   
        }
        ?>

      </div>
      </form>
      </div>
     
      
    </div>
  </div>
</div>

</section>


<body style="background-color:#00FFFFFF">


<script>
      $(document).ready(function()
      {
         $("#miModal").modal("show");
      });
    </script>

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