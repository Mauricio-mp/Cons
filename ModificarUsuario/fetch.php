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
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
  
	$elegido=$_POST['elegido'];

  $optenerIdRol= mssql_query("SELECT * FROM SERoles WHERE Nombre='$elegido'");
  if($optenerIdRol1= mssql_fetch_array($optenerIdRol)){
    $id=$optenerIdRol1['Id_Rol'];
  }


$val1=0;
$val2=0;
$val3=0;
$val4=0;
$val5=0;
$val6=0;
$val7=0;
$val8=0;
$val9=0;
$val10=0;
$val11=0;
$val12=0;
$val13=0;
$val14=0;
$val15=0;
$val16=0;
$val17=0;
$val18=0;
$val19=0;
$val20=0;
$val21=0;





	$consultar=mssql_query("SELECT * FROM SERoles_Permisos WHERE Id_Rol='$id'");
     while($row = mssql_fetch_array($consultar)){
     	$row['Id_Permiso'];
         
        if ($row['Id_Permiso']==1) {
                 $val1=1;
             }     
          
        if ($row['Id_Permiso']==2) {
                 $val2=1;
             } 
        if ($row['Id_Permiso']==3) {
                 $val3=1;
             } 
        if ($row['Id_Permiso']==4) {
                 $val4=1;
             } 
        if ($row['Id_Permiso']==5) {
                 $val5=1;
             }              

        if ($row['Id_Permiso']==6) {
                 $val6=1;
             } 
        if ($row['Id_Permiso']==7) {
                 $val7=1;
             } 
        if ($row['Id_Permiso']==8) {
                 $val8=1;
             } 

        if ($row['Id_Permiso']==9) {
                 $val9=1;
             } 
        if ($row['Id_Permiso']==10) {
                 $val10=1;
             } 
        if ($row['Id_Permiso']==11) {
                 $val11=1;
             } 
        if ($row['Id_Permiso']==12) {
                 $val12=1;
             } 
        if ($row['Id_Permiso']==13) {
                 $val13=1;
             } 
        if ($row['Id_Permiso']==14) {
                 $val14=1;
             } 
        if ($row['Id_Permiso']==15) {
                 $val15=1;
             } 
        if ($row['Id_Permiso']==16) {
                 $val16=1;
             } 
        if ($row['Id_Permiso']==17) {
                 $val17=1;
             } 
        if ($row['Id_Permiso']==18) {
                 $val18=1;
             } 
        if ($row['Id_Permiso']==19) {
                 $val19=1;
             }                
        if ($row['Id_Permiso']==20) {
                 $val20=1;
             }                
        if ($row['Id_Permiso']==21) {
                 $val21=1;
             }                


        



        }
	 ?>

  <input type="checkbox" name="CTSD" value="1" <?php if ($val1==1) { echo "checked"; }  ?>> Constancia de Trabajo sin Deducciones<br>
  <input type="checkbox" name="CTCDN" value="2" <?php if ($val2==1) { echo "checked"; }  ?>>  Constancia de Trabajo con Deducciones Normal<br>
  <input type="checkbox" name="CTCDCP" value="3"<?php if ($val3==1) { echo "checked"; }  ?>> Constancia de Trabajo con Deducciones con Plus<br>
  <input type="checkbox" name="CTCDSP" value="4"<?php if ($val4==1) { echo "checked"; }  ?>> Constancia de Trabajo con Deducciones sin Plus<br>
  <input type="checkbox" name="TRECE_AVO" value="5"<?php if ($val5==1) { echo "checked"; }  ?>>  Constancia para Bono de 13AVO<br>
  <input type="checkbox" name="CATORCE_AVO" value="6"<?php if ($val6==1) { echo "checked"; }  ?>> Constancia para Bono de 14AVO<br>
  <input type="checkbox" name="VAC" value="7"<?php if ($val7==1) { echo "checked"; }  ?>> Constancia para Bono de Vacaciones<br>
  <input type="checkbox" name="UNIVERSIDADES" value="8"<?php if ($val8==1) { echo "checked"; }  ?>>  Constancia para Universidades<br>
  <input type="checkbox" name="EMBAJADAS" value="9"<?php if ($val9==1) { echo "checked"; }  ?>> Constancia para Embajadas/Consulados<br>
  <input type="checkbox" name="TSC" value="10"<?php if ($val10==1) { echo "checked"; }  ?>> Constancia para T.S.C.<br>
  <input type="checkbox" name="CANCELADOS" value="11"<?php if ($val11==1) { echo "checked"; }  ?>>  Constancia de Cancelados<br>
  <input type="checkbox" name="NC" value="12"<?php if ($val12==1) { echo "checked"; }  ?>> Nueva Cooperativa<br>
  <input type="checkbox" name="MC" value="13"<?php if ($val13==1) { echo "checked"; }  ?>>  Mantenimiento Cooperativa<br>
  <input type="checkbox" name="NFA" value="14"<?php if ($val14==1) { echo "checked"; }  ?>> Nueva Firma de Autorizacion<br>
  <input type="checkbox" name="MFA" value="15"<?php if ($val15==1) { echo "checked"; }  ?>> Mantenimiento de Firma de Autorizacion<br>
  <input type="checkbox" name="NEC" value="16"<?php if ($val16==1) { echo "checked"; }  ?>>  Nueva Emabaja/Consulado<br>
  <input type="checkbox" name="NU" value="17"<?php if ($val17==1) { echo "checked"; }  ?>> Nuevo Usuario<br>
  <input type="checkbox" name="MU" value="18"<?php if ($val18==1) { echo "checked"; }  ?>> Mantenimiento Usuario<br>
  <input type="checkbox" name="CR" value="19"<?php if ($val19==1) { echo "checked"; }  ?>>  Crear Roll<br>
  <input type="checkbox" name="CV" value="20"<?php if ($val20==1) { echo "checked"; }  ?>> Cambiar Clave<br>
  <input type="checkbox" name="AC" value="21"<?php if ($val21==1) { echo "checked"; }  ?>> Anular Constancias<br>
</body>
</html>