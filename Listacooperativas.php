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

  <!-- Fin de Js solo para control de movimiento deslizante  -->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  




            
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
  <div class="container">
  <nav class="navbar navbar-inverse">
    <div class="navbar-header"> 
  </div>
  <div class="collapse navbar-collapse js-navbar-collapse">
    <ul class="nav navbar-nav">
 <a class="navbar-brand" href="inicio.php"><?php echo $_SESSION['username']; ?></a>
    </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="Home.php">Inicio</a></li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Constancias <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
         <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Constancias de Trabajo<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a  href="./Cons_Sin_Ded">Sin Deducciones</a></li>
          <li><a  href="./Cons_Con_Ded">Con Deducciones</a></li>
        </ul>
      </li>
            <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Bonos<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="./Cons_13-14">13Avo/14Avo</a></li>
           <li><a tabindex="-1" href="./Cons_Vac">Vacaciones</a></li>
        </ul>
      </li>
        <li><a tabindex="-1" href="./Cons_Uni">Universidades</a></li>
          <li><a tabindex="-1" href="./Cons_Emb">Embajadas y Consulados</a></li>
            <li><a tabindex="-1" href="./TSC">T.S.C.</a></li>
              <li><a tabindex="-1" href="Cons_Cancelados">Cancelados</a></li>


            
            <!--<li class="divider"></li>
            <li><a href="#">Separated link</a></li>-->
          </ul>
        </li>


       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="Busq_Cons1">ver constancias Emitidas</a></li>
            <li><a href="Busq_Cons4">constancias Emitidas (T.S.C, Cancelados)</a></li>
            <li><a href="Busq_Cons2">Buscar Empleado</a></li>
            <li><a href="Busq_Cons3">Detalle de Constancias</a></li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mantenimiento <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Cooperativas<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="Nuevacooperativa.php">Nueva</a></li>
                 <li><a tabindex="-1" href="Listacooperativas.php">Modificar</a></li>
                  </ul>
                 </li>

                <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Firma de Autorizacion<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="Nuevafirma.php">Nueva</a></li>
                 <li><a tabindex="-1" href="ModificarFirma">Modificar</a></li>
                  </ul>
                 </li>

                 
                
                 <li><a tabindex="-1" href="Nuevaembajada.php">Nueva Embajada o Consulado</a></li>
                  <li><a tabindex="-1" href="Nuevaembajada.php">Anular Constancias</a></li>
 <li><a tabindex="-1" href="./Entrega_cons">Entregar Constancias</a></li>
                   <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Constancia T.S.C<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="./Mant_Acuerdo">Acuerdo</a></li>
                 <li><a tabindex="-1" href="./Mant_Acuerdo/excel.php">Excel</a></li>
                  </ul>
                 </li>

                   <li class="dropdown-submenu">
                 <a class="test" tabindex="-1" href="#">Constancia Deducciones<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="Man_Cons_Con">Ingresos</a></li>
                 <li><a tabindex="-1" href="Man_Cons_Con/deducciones.php">Deducciones</a></li>
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
                   <li><a tabindex="-1" href="Nuevousuario.php">Nuevo Usuario</a></li>
                 <li><a tabindex="-1" href="ModificarUsuario">Modificar Usuario</a></li>
                  </ul>
                 </li>
                <li><a tabindex="-1" href="Nuevorol.php">Crear Roll</a></li>
                  <li><a data-toggle="modal" data-target="#CambiarContra">Cambiar Contraseña</a></li>
          </ul>
        </li>




        
        <li><a href="#"   data-toggle="modal" data-target="#miModal">Cerrar sesión</a></li>
        
        
<!-- Modal -->
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button onclick="location.href='index.php'" type="button" class="btn btn-primary">si</button>
      </div>
    </div>
  </div>
</div> 

       
  <!-- Modal -->
<div class="modal fade" id="CambiarContra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GECOMP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
       <div class="form-group label-floating">
        <label class="control-label"> Ingrese Contraseña Anterior</label>
         <input class="form-control" id="psw1" type="password" required/>
             <div id="result"></div>
      </div>
     

       
       <div class="form-group label-floating">
        <label class="control-label"> Nueva contraseña</label>
            <input class="form-control" id="psw2" type="password" required/>
      </div>
      

       
       <div class="form-group label-floating">
       <label class="control-label">Verificar Nueva contraseña</label>
            <input class="form-control" id="psw3" type="password" required/>
      </div>
      <div id="valid"></div>
                <div id="insert"></div>
      </div>
         <script>
                $(document).ready(function(){
                  $('#psw1').on('keyup', function(){

                    var psw1=document.getElementById('psw1').value

                      $.ajax({method:'POST', data:{psw1:psw1},url:'validarContra.php',success:function(data)
                    {
                      //$('#insert').html(data);
                      $('#result').html(data);
                      
                    }
                      
                   
                
                   });   
  
                });

                  $('#psw3').on('keyup', function(){

                    var psw2=document.getElementById('psw2').value
                    var psw3=document.getElementById('psw3').value

                      $.ajax({method:'POST', data:{psw2:psw2,psw3:psw3},url:'validarContra1.php',success:function(data)
                    {
                      //$('#op').html(data);
                      $('#valid').html(data);
                      
                    }
                      
                   
                
                   });   
  
                });

                    $('#guardar').click(function(){
                    var psw1=document.getElementById('psw1').value
          var psw2=document.getElementById('psw2').value
                    var psw3=document.getElementById('psw3').value


                    $.ajax({method:'POST', data:{psw1:psw1,psw2:psw2,psw3:psw3},url:'insertarContra.php',success:function(data)
                    {
                       $('#insert').html(data);
                    }
                });

                 }); 

                  });
                      
                     </script>
      </form>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-close"></i> Cerrar</button>
              <button type="button"  name="guardar"  id="guardar" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>       



<!-- modal de Nuevo Porcentaje de Retencion-->


</section>

<body class="Fondo">
<section>

          <form class="center" method="post">
                        
                      <h1 align="center" class="">LISTA DE COOOPERATIVAS</h1>

       
                       <br>
                       <div class="table-responsive">  
                         <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td bgcolor="#E3F1F6" style="text-align:center;"><b>ESTADO</b></td>  
                                    <td bgcolor="#E3F1F6" style="text-align:center;"><b>SIGLAS</b></td>  
                                    <td bgcolor="#E3F1F6" style="text-align:center;"><b>NOMBRE DE COOPERATIVA</b></td>  
                                    <td bgcolor="#E3F1F6" style="text-align:center;"><b>ADELANTO/MESES</b></td>  
                                    <td bgcolor="#E3F1F6" style="text-align:center;"><b>VAC</b></td>  
                                     <td bgcolor="#E3F1F6" style="text-align:center;"><b>13AVO.</b></td>  
                                      <td bgcolor="#E3F1F6" style="text-align:center;"><b>14AVO.</b></td>  
                                      <td bgcolor="#E3F1F6" style="text-align:center;"><b>CONSULTAR</b></td>
                               </tr>  
                          </thead>  
                         <?php
                         
                            $Estado = 1;

                $COLOR="#FFFFFF";
                $result= mssql_query("SELECT Id_Cooperativa, SIGLAS_COOPERATIVA, NOMBRE_COOPERATIVA, MESES_ADELANTO, VAC, TRECE_AVO, CATORCE_AVO, ESTATUS FROM COOPERATIVAS ORDER BY Id_Cooperativa ASC");     
                     while($row = mssql_fetch_array($result)){
                      $galletas = true;

                        if($row[7] == 1) {
                      $galletas="ACTIVA";
                       $COLOR="#FFFFFF";
                        } else {
                        $galletas="INACTIVA";
                        $COLOR="#FFAA99";
                        }

                         if($row[4] == 1) {
                      $valor1="SI";
                        } else {
                        $valor1="NO";
                        }
                            if($row[5] == 1) {
                      $valor2="SI";
                        } else {
                        $valor2="NO";
                        }
                                if($row[6] == 1) {
                      $valor3="SI";
                        } else {
                        $valor3="NO";
                        }
                        
                   echo "
                  <tr>
                        <td bgcolor=\"".$COLOR."\" align=\"center\">".$galletas."</td>
                    <td bgcolor=\"".$COLOR."\" align=\"center\">".$row[1]."</td>
                    <td bgcolor=\"".$COLOR."\" align=\"center\">".$row[2]."</td>
                    <td bgcolor=\"".$COLOR."\" align=\"center\">".$row[3]."</td>
                    <td bgcolor=\"".$COLOR."\" align=\"center\">".$valor1."</td>
                     <td bgcolor=\"".$COLOR."\" align=\"center\">".$valor2."</td>
                     <td bgcolor=\"".$COLOR."\" align=\"center\">".$valor3."</td>
                    <td bgcolor=\"".$COLOR."\" ><a href='Modificarcooperativa.php?x={$row[0]}'>Modificar</a></td>
                  </tr>";
                   
                }     
                
                           ?>
                       
                            </table>  
                </div>  
           
         
              
         
                    
                  </form>

                </section>
	<!-- Content page-->

 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  



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
