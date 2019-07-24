<?php
$server = '172.17.0.170:1433';
$username='sa';
$password ='ministerio';
$connect= mssql_connect ($server,$username,$password);

if (!$connect || !mssql_select_db('mpsiafi', $connect)) {
	header("location:Error_de_Conexion.php");
    
   }
  ?>