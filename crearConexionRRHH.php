
<!DOCTYPE html>
<html>
<?php
$server = '172.17.0.170:1433';
$username='sa';
$password ='ministerio';
$conexion= mssql_connect ($server,$username,$password);

if (!$conexion || !mssql_select_db('RecursosHumanos', $conexion)) {
	header("location:Error_de_Conexion.php");
    
   }
  ?>