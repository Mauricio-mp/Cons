<?php 
include('../crearConexionGECOMP.php');
$msg='';
$NOMBRE_COOPERATIVA= $_POST['NOMBRE_COOPERATIVA'];
$msg1=1;

$sql=mssql_query("SELECT * FROM COOPERATIVAS WHERE Id_Cooperativa= '$NOMBRE_COOPERATIVA'");

if($fila=mssql_fetch_array($sql)){

  $msg.= "<strong>Meses de Adelanto:</strong>"."\t".$fila['MESES_ADELANTO'];
$msg1=1;
 $_SESSION['prueb']=1;

echo $msg;


}



 ?>