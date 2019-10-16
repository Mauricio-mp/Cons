<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
include('crearConexionGECOMP.php');
session_start();
ob_start();

if($conn){
$codigo=$_POST['UserEmail'];
$password=$_POST['UserPass'];



	$result= mssql_query("SELECT * FROM SEIngreso_Login WHERE Estado=1 and CodEmpleado='$codigo' and Contrasenia='$password'");
    $row = mssql_fetch_array($result);
    if ($row) {
    
		if($codigo == $row['CodEmpleado'] && $password == $row['Contrasenia']){
            $_SESSION['CodEmpleado']=$row['CodEmpleado'];
			$_SESSION['username']=$row['Nombre'];
			$_SESSION['apellido']=$row['Apellido'];
			$_SESSION['logeo']=$row['CodEmpleado'];
		header("location:Home.php");
	}

    mssql_free_result($result);
    unset($_SESSION['Contrasenia'], $password);
    }else{
    echo "<script>";
    echo "alert('USARIO Y CONTRASEÑA INCORRECTOS');";
    echo "window.location = 'index.php';";
    echo "</script>";
    }
    
    
}
 ?>
</body>
</html>