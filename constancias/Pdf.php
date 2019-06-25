<?php 
$idFirma=$_GET['x'];
$numeroEmpleado=$_GET['proce'];
include('Cons_Sin_Ded/ConversionSueldo.php');
include('Cons_Sin_Ded/ConversionFecha.php');
include('crearConexionVam.php'); 
$mostrarDatos=mssql_query("SELECT * FROM prempy  WHERE cempno='$numeroEmpleado'");
if ($row=mssql_fetch_array($mostrarDatos)) {
	$DESC=$row['cfedid'];
	$codigoPuesto=$row['cjobtitle'];
	$codigoAsignado=$row['cdeptno'];
	$opnetersueldo=$row['nmonthpay'];
	$nombre=trim($row['cfname']);
	$apellido=trim($row['clname']);
	//echo "<script>alert('".$DESC."');</script>";

   $dia1 = date("d", strtotime($row['dhire']));
   $mes1 = date("m", strtotime($row['dhire']));
   $anio1 = date("Y", strtotime($row['dhire']));

   $dia2 = date("d", strtotime($row['dcntrct']));
   $mes2 = date("m", strtotime($row['dcntrct']));
   $anio2 = date("Y", strtotime($row['dcntrct']));
 
   $fechaContrato=fecha($dia1,$mes1,$anio1); 
   $fechaAcuerdo=fecha($dia2,$mes2,$anio2); 

  if ($row['dhire']==$row['dcntrct']) {
  	$msg="HA LABORADO POR ACURDO EN ESTA INSTITUCION A PARTIR DEL ".$fechaContrato.", ";
  }
  if ($row['dhire']>$row['dcntrct']) {
  	$msg="HA LABORADO POR CONTRATO EN ESTA INSTITUCION APARTIR DE ".$fechaContrato." Y POR ACUERDO DESDE EL ".$fechaAcuerdo.",";
  }
$var=convertir($opnetersueldo);


$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
	$desempenio=trim($ejecutar['cDesc']);
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
	$asignacion=trim($asignado['cdeptname']);
}


	
}
$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fechaActual=fecha1($dia,$mes,$anio); 

include('crearConexionGECOMP.php');
$mostrarDato=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA='$idFirma'");
if ($firma=mssql_fetch_array($mostrarDato)) {
	$nombreFirma=$firma['NOMBRE_EMPLEADO'];
}




include('fpdf/fpdf.php');

session_start();
ob_start();


  
$pdf=new fpdf(); //en esta linea armamos el constructor $pdf e iniciamos la libreria, esto con el fin de poder usar todos los elementos de la misma.

$pdf->AddPage(); //aqui incluimos una pagina al documento.


$pdf->SetFont('Times','B',14); //en esta se define la fuente, el estilo de la fuente y el tamaño.
$pdf->Image('img/9.png', 60, 5, 90);
$pdf->Cell(190,45,'',0,1,'C');	
$pdf->Cell(190,5,'CONSTANCIAS',0,1,'C');

 
$pdf->SetFont('Arial','B',16);

 
$pdf->Cell(50,10,'',0,1);
 
$pdf->SetFont('Arial','',10);
$texto="LA SUSCRITA SUBJEFE DEL DEPARTAMENDO DE PERSONAL DEL MINISTERIO PUBLICO HACE CONSTAR QUE ".utf8_encode($nombre)."\t".utf8_encode($apellido)."\t".$msg."\t"."ACTUALMENTE SE DESEMPEÑA COMO:\t".trim($desempenio)."\t"."ASIGNADO A:\t".utf8_encode($asignacion)."\t"."DEVENGANDO UN SUELDO MENSUAL DE:\t".$var."\t"."(".$opnetersueldo.").";
$pdf->MultiCell(190,5,utf8_decode($texto),0,1,'J');


$texto1="PARA LOS FINES QUE AL INTERESADO LE CONVENGA SE LE EXTIENDE LA PRESENTE EN LA CIUDAD DE TEGUCIGALPA, MUNICIPIO DEL DISTRITO CENTRAL A ".$fechaActual.".";
$pdf->Cell(190,15,'',0,1,'C');	
trim($desempenio)."\t"."ASIGNADO A:\t".utf8_encode($asignacion)."\t"."DEVENGANDO UN SUELDO MENSUAL DE:\t".$var."\t"."(".$opnetersueldo.").";
$pdf->MultiCell(190,5,utf8_decode($texto1),0,1,'J');

$pdf->Cell(190,80,'',0,1,'C');	
$pdf->Line(20,200,190,200);
$pdf->MultiCell(190,5,utf8_encode($nombreFirma),0,1,'C');
$pdf->MultiCell(190,5,utf8_encode('SUB JEFE DEPARTAMENTO DE PERSONAL'),0,1,'C');



$pdf->SetFont('Times','B',7); //en esta se define la fuente, el estilo de la fuente y el tamaño.
$pdf->Cell(190,55,'',0,1,'C');	
$pdf->Line(20,265,190,265);
$pdf->MultiCell(190,5,utf8_encode('Edificio Lomas Plaza II, Lomas del guijaro, Avenida Republica Dominicana, Tegucigalpa D.M.C, Honduras C.A 1'),0,1,'C');
$pdf->MultiCell(190,5,utf8_encode('apartado postal No, 3730, Tel:(504)2221-3099, FAX:(504)2221-5667'),0,1,'C');


 
$pdf->Output();






//$pdf->Output();


?>