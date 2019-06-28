<?php 
include('crearConexionGECOMP.php');
session_start();
ob_start();
$psw1= $_POST['psw1'];
$usuario=$_SESSION['logeo'];

$consulta= mssql_query("SELECT * FROM SEIngreso_Login WHERE CodEmpleado = '$usuario'");
$ejecutar= mssql_fetch_array($consulta);
if ($ejecutar['Contrasenia']==$psw1) {
	echo "<strong>Contraseña Correcta </strong>";
}else{
	echo "<strong><p style='color: #008000; opacity: 0.7'>Contraseña Incorrecta</p></strong>";
}
 ?>
