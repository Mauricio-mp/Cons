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
                       <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">Con Deducciones<span class="caret"></span></a>
                       <ul class="dropdown-menu">
                         <li><a tabindex="-1" href="./Cons_Con_Ded">Normal</a></li>
                           <li><a tabindex="-1" href="Porcentaje.php">Con Plus</a></li>
                              <li><a tabindex="-1" href="Porcentaje.php">Sin Plus</a></li>
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
        <li><a tabindex="-1" href="./Cons_Uni">Universidades</a></li>
          <li><a tabindex="-1" href="./Cons_Emb">Embajadas y Consulados</a></li>
            <li><a tabindex="-1" href="Porcentaje.php">T.S.C.</a></li>
              <li><a tabindex="-1" href="Porcentaje.php">Cancelados</a></li>



            
            <!--<li class="divider"></li>
            <li><a href="#">Separated link</a></li>-->
          </ul>
        </li>


       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="Man_mp.php">1</a></li>
            <li><a href="Man_pr.php">2</a></li>
            <li><a href="cai.php">3</a></li>
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




        
        <li><a href="#"   data-toggle="modal" data-target="#miModal">Cerra Session</a></li>
        
        
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

<body style="background-color:#00FFFFFF">

<section>
          <div class="center" style="background-color: #FFFFFFFF;">
        	<form  method="post">
         


              <h1 align="center" >CREAR NUEVO ROL DE ACCESO</h1>
              <h1 align="center" ></h1>

                          <div class="form-group label-floating">
                        <label class="control-label">Ingrese El Nombre del Nuevo Rol</label>
                        <input class="form-control" type="text" Id="CNuevorol" name="CNuevorol" Required onkeypress="return mCheck(event)" pattern="[A-Z 0-9 ]{6,50}" title="Unicamente Letras Mayusculas, Minimo 6 y Maximo 50" placeholder="Ingrese El Nombre del Nuevo Rol">
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

                        

                            <div class="center" style="background-color: #FFFFFFFF;">
                              <h4 align="center" ><b>Seleccione Los Accesos que Tendra este Rol</b></h4>
                             <h4 align="center" ><b></b></h4>
                          <input type="checkbox" name="CTSD" value="1"> Constancia de Trabajo sin Deducciones<br>
                          <input type="checkbox" name="CTCDN" value="1">  Constancia de Trabajo con Deducciones Normal<br>
                          <input type="checkbox" name="CTCDCP" value="1"> Constancia de Trabajo con Deducciones con Plus<br>
                          <input type="checkbox" name="CTCDSP" value="1"> Constancia de Trabajo con Deducciones sin Plus<br>
                          <input type="checkbox" name="TRECE_AVO" value="1">  Constancia para Bono de 13AVO<br>
                          <input type="checkbox" name="CATORCE_AVO" value="1"> Constancia para Bono de 14AVO<br>
                          <input type="checkbox" name="VAC" value="1"> Constancia para Bono de Vacaciones<br>
                          <input type="checkbox" name="UNIVERSIDADES" value="1">  Constancia para Universidades<br>
                          <input type="checkbox" name="EMBAJADAS" value="1"> Constancia para Embajadas/Consulados<br>
                          <input type="checkbox" name="TSC" value="1"> Constancia para T.S.C.<br>
                          <input type="checkbox" name="CANCELADOS" value="1">  Constancia de Cancelados<br>
                           <input type="checkbox" name="NC" value="1"> Nueva Cooperativa<br>
                          <input type="checkbox" name="MC" value="1">  Mantenimiento Cooperativa<br>
                          <input type="checkbox" name="NFA" value="1"> Nueva Firma de Autorizacion<br>
                          <input type="checkbox" name="MFA" value="1"> Mantenimiento de Firma de Autorizacion<br>
                          <input type="checkbox" name="NEC" value="1">  Nueva Emabaja/Consulado<br>
                          <input type="checkbox" name="NU" value="1"> Nuevo Usuario<br>
                          <input type="checkbox" name="MU" value="1"> Mantenimiento Usuario<br>
                          <input type="checkbox" name="CR" value="1">  Crear Roll<br>
                          <input type="checkbox" name="CV" value="1"> Cambiar Clave<br>
                          <input type="checkbox" name="AC" value="1"> Anular Constancias<br>
                       
                             
                              

                               </div>
                          

                            <div class="">
                               <h4 align="center" ></h4>
                               <button type="submit" name="guardar" class="btn btn-info btn-xs btn-block" >Guardar</button>

                                     <?php
                                     if (isset($_POST['guardar'])) {
                                      $val=0;
                                
                                   $Nuevorol=utf8_decode($_POST['CNuevorol']);

                                   $validarRol=mssql_query("SELECT * FROM SERoles");
                                   while($ejecutar= mssql_fetch_array($validarRol)) {
                                      if ($Nuevorol== $ejecutar['Nombre']) {
                                        $val=1;
                                      }

                                   }
                                    if ($val==1) {
                                      echo "<script> alert('EL ROL:\t ".$Nuevorol."\t YA EXISTE, POR FAVOR ELIGA OTRO '); </script>";
                                    }
                                    if ($val==0) {
                                       $res1=mssql_query("INSERT INTO SERoles (Nombre, USUARIO_CREACION, FECHA_CREACION) VALUES ('$Nuevorol','006351',Getdate())");
                                        if ($res1==true) {
                                              $res2=mssql_query("SELECT MAX(Id_Rol) AS Id_Rol FROM SERoles");
                                                 while($row = mssql_fetch_array($res2)){
                                                         $idrol = number_format($row[0]);
                                                  }

                                        }



                                     function insertar ($idrol, $Id_Permiso) {

                             
                                       $res=mssql_query("INSERT INTO SERoles_Permisos (Id_Rol, Id_Permiso, USUARIO_CREACION, FECHA_CREACION) VALUES ('$idrol','$Id_Permiso','006351',Getdate())");
                                        if ($res==true) {
                                          $res1=1;
                                        }else{
                                         $res1=0;
                                        }

                                       }


                                             if (isset($_POST["CTSD"])) {
                                             $Id_Permiso=1;
                                             insertar($idrol, $Id_Permiso);
                                            } 

                                             if (isset($_POST["CTCDN"])) {
                                             $Id_Permiso=2;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                             if (isset($_POST["CTCDCP"])) {
                                             $Id_Permiso=3;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                             if (isset($_POST["CTCDSP"])) {
                                             $Id_Permiso=4;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                               if (isset($_POST["TRECE_AVO"])) {
                                             $Id_Permiso=5;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                                if (isset($_POST["CATORCE_AVO"])) {
                                             $Id_Permiso=6;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                                  if (isset($_POST["VAC"])) {
                                             $Id_Permiso=7;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                             if (isset($_POST["UNIVERSIDADES"])) {
                                             $Id_Permiso=8;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                            if (isset($_POST["EMBAJADAS"])) {
                                             $Id_Permiso=9;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                             if (isset($_POST["TSC"])) {
                                             $Id_Permiso=10;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                             if (isset($_POST["CANCELADOS"])) {
                                             $Id_Permiso=11;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["NC"])) {
                                             $Id_Permiso=12;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["MC"])) {
                                             $Id_Permiso=13;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["NFA"])) {
                                             $Id_Permiso=14;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                             if (isset($_POST["MFA"])) {
                                             $Id_Permiso=15;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["NEC"])) {
                                             $Id_Permiso=16;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["NU"])) {
                                             $Id_Permiso=17;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["MU"])) {
                                             $Id_Permiso=18;
                                             insertar($idrol, $Id_Permiso);
                                            } 
                                              if (isset($_POST["CR"])) {
                                             $Id_Permiso=19;
                                             insertar($idrol, $Id_Permiso);
                                            }
                                              if (isset($_POST["CV"])) {
                                             $Id_Permiso=20;
                                             insertar($idrol, $Id_Permiso);
                                            }
                                                 if (isset($_POST["AC"])) {
                                             $Id_Permiso=21;
                                             insertar($idrol, $Id_Permiso);
                                            }
                                             
                                              if ($res1==1) {
                                          echo "<script> alert('Datos Almacenados con Exito'); </script>";
                                        }else{
                                          echo "<script> alert('Datos no Ingresados'); </script>";
                                        }
                                    }
                                  
                                   //$usuario=$_SESSION['logeo'];


                                        
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