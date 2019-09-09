<?php
include('crearConexionGECOMP.php');
session_start();
ob_start();
$val=0;

$psw1= $_POST['psw1'];
$psw2= $_POST['psw2'];
$psw3= $_POST['psw3'];
$usuario=$_SESSION['logeo'];


$consulta= mssql_query("SELECT * FROM SEIngreso_Login WHERE CodEmpleado = '$usuario'");
$ejecutar= mssql_fetch_array($consulta);

if ($ejecutar['Contrasenia']==$psw1) {
	$val=1;
}else{
	$val=0;
}

if ($psw2==$psw3) {
	$val=1;
}else{
	$val=2;
}



if ($psw1=='' or $psw2=='' or $psw3=='' or strlen($psw2)<=8 or strlen($psw3)<=8) {
	echo "<script>alert('Datos Incorrectos');</script>";
	$val=0;
}

if ($val==1) {
	$actualizar=mssql_query("UPDATE SEIngreso_Login SET Contrasenia = '$psw3'  WHERE CodEmpleado = '$usuario'");
	
echo "<script>";
    echo "alert('Contraseña Actualizada Correctamente');";
    echo "window.location = 'index.php';";
    echo "</script>";
	

}

if ($val==2) {
	
	
	
echo "Las contraseñas deben Coincidir";
	

}


  ?>