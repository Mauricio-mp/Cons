<?php
include('../crearConexionGECOMP.php');
session_start();
ob_start();
$UsusarioLogeado=$_SESSION['logeo'];
$arrayCodigo=$_POST['Codigo'];   
$arrProv=$_POST['Proveniente'];  
$arrLugar=$_POST['Lufar'];   
$arrNombre=$_POST['Nombre'];  
$arrIdenti=$_POST['Identidad'];  
$arrPuesto=$_POST['puesto'];  
$arrDepto=$_POST['Departamento'];  
$arrSueldo=$_POST['sueldo'];  
$arrCajaChica=$_POST['cajachica'];  
$arrPago=$_POST['Pagoplus'];  
$arrZonajePlus=$_POST['ZonajePlus'];  
$arrZonaje=$_POST['Zonaje'];  
$arrRotatorio=$_POST['Rotatirio'];  
$arrCombus=$_POST['Combustible'];  

$filas= count($arrayCodigo);
echo count($arrProv);
//$update=mssql_query("UPDATE  Base_Constancia SET Estado=0 WHERE Estado=1");
if($update==false){
    echo "error";
}else{
    for ($i=0; $i <$filas ; $i++) { 
        echo $arrayCodigo[$i];

      //  $insertar=mssql_query("INSERT INTO Base_Constancia (Base_Empledo,Salario,Caja_Chica,Plus,Zonaje_Plus,Zonaje,Fondo_Reint,Fondo_Combus,Usuario_creacion,Fecha_Creacion,Estado,Proveniente,Lugar,Puesto,Departamento)
       // VALUES('$arrayCodigo[$i]','$arrSueldo[$i]','$arrCajaChica[$i]','$arrPago[$i]','$arrZonajePlus[$i]','$arrZonaje[$i]','$arrRotatorio[$i]','$arrCombus[$i]','$UsusarioLogeado',GETDATE(),'1','$arrProv[$i]','$arrLugar[$i]','$arrPuesto[$i]','$arrDepto[$i]')");
      
      
     
     }

     if($insertar==true){
         echo "Insertados Con Exito";
     }else{

     }
}



?>
