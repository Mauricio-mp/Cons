
<?php
$server = '172.17.0.152:1433';
$username='sa';
$password ='';
$conn= mssql_connect ($server,$username,$password);

if (!$conn || !mssql_select_db('GECOMP', $conn)) {
	header("location:Error_de_Conexion.php");
   
   }
  ?>
