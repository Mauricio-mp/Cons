<?php 
$idFirma=$_GET['x'];
$numeroEmpleado=$_GET['proce'];
$conca=$_GET['ido'];

//require('../fpdf/fpdf.php');
require('../fpdf/WriteTag.php');
require('ConversionSueldo.php');
require('ConversionFecha.php');
include('../crearConexionVam.php'); 
$mostrarDatos=mssql_query("SELECT * FROM prempy  WHERE cempno='$numeroEmpleado'");
if ($row=mssql_fetch_array($mostrarDatos)) {
    $DESC=$row['cfedid'];
    $codigoPuesto=$row['cjobtitle'];
    $codigoAsignado=$row['cdeptno'];
    $opnetersueldo=$row['nmonthpay'];
    $nombre=trim($row['cfname']);
    $apellido=trim($row['clname']);
    $Identidad=trim($row['cfedid']);
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
$formato=number_format($opnetersueldo,2);


$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=trim($ejecutar['cDesc']);
    $desemp=strtolower($desempenio);
    $desempenio=ucwords($desemp);
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
      $asignacion=trim($asignado['cdeptname']);
     $asignacion_minuscula=strtolower($asignacion);
    $asignacion=ucwords($asignacion_minuscula);
}


    
}
$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fechaActual=fecha1($dia,$mes,$anio); 

include('../crearConexionGECOMP.php');
$mostrarDato=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA='$idFirma'");
if ($firma=mssql_fetch_array($mostrarDato)) {
  $nombreFirma=$firma['NOMBRE_EMPLEADO'];

  $FrimaCons=strtoupper($nombreFirma);
  $nombreFirma=ucwords($FrimaCons);
  $puestoFirma=$firma['PUESTO_EMPLEADO'];
}


//****************** CONSULTAS DE ACUERDOS *****************////////

include('../crearConexionGECOMP.php');
$consultar=mssql_query("SELECT * FROM Carta_Constancia WHERE Estado='1'");
if ($consultaAcuerdo=mssql_fetch_array($consultar)) {
  
$consultaAcuerdo['Nombre_Acuerdo'];
$nuevafrecha= date("d/m/Y",strtotime($consultaAcuerdo['Fecha_Inicial']));
$Fecha_Efectivo= date("d/m/Y",strtotime($consultaAcuerdo['Fecha_Efectivo']));


}
//****************** CONSULTAS DE Base constancis *****************////////
$formato_Chaja_Chica="No Definido ";

 $formato_Plus_Sueldo="No Definido";


 $Formato_Zonaje_Plus="No Definido";


 $Formato_Zonaje="No Definido";


 $formato_Fondo_Reint="No Definido";


 $formato_Fondo_Combus="No Definido";

$consultarfondos=mssql_query("SELECT * FROM Base_Constancia WHERE Base_Empledo='$numeroEmpleado' and Estado='1'");
if ($fondos=mssql_fetch_array($consultarfondos)) {
  $fondos_Chaja_Chica=$fondos['Caja_Chica'];
 $formato_Chaja_Chica=number_format($fondos['Caja_Chica'],2);

  $fondos_Plus_Sueldo=$fondos['Plus'];
 $formato_Plus_Sueldo=number_format($fondos['Plus'],2);

  $Zonaje_Plus=$fondos['Zonaje_Plus'];
 $Formato_Zonaje_Plus=number_format($fondos['Zonaje_Plus'],2);

 $Zonaje=$fondos['Zonaje'];
 $Formato_Zonaje=number_format($fondos['Zonaje'],2);

 $Fondo_Reint=$fondos['Fondo_Reint'];
 $formato_Fondo_Reint=number_format($fondos['Fondo_Reint'],2);

 $fondos_Fondo_Combus=$fondos['Fondo_Combus'];
 $formato_Fondo_Combus=number_format($fondos['Fondo_Combus'],2);

}
$dia_actual=convertir2($dia); 
$mes_actual= fecha2($mes);
$anio_actual=convertir2($anio); 


class PDF extends PDF_WriteTag
{
// Page header
function Header()
{

    // Logo
    $this->Image('../img/9.png',70,6,75);
    // Arial bold 15
     $this->SetFont('Times','B',14);
    $this->SetTextColor(194,8,8);
    $this->Cell(45,0,'Prueba',0,0,'C');
    // Move to the right
     $this->SetFont('Times','B',14);
     $this->SetTextColor(0,0,0);
    $this->Ln(25);
    $this->Cell(72);
    // Title

    //$this->Cell(45,0,'CONSTANCIA',0,0,'C');
    // Line break
    //$this->Ln(20);
}

// Page footer
function Footer()
{

    global $conca;
      // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->SetLineWidth(0);
    //$this->Line(20,280,190,280);
    $this->Cell(0,0,'Edificio Lomas Plaza II, Lomas del guijaro, Avenida Republica Dominicana, Tegucigalpa M.D.C, Honduras C.A.',0,0,'C');
    $this->Ln();
    $this->Cell(0,10,'apartado postal No, 3730, Tel:(504)2221-3099, FAX:(504)2221-5667',0,0,'C');
    $this->Ln();
    $this->SetTextColor(0,0,0);
    $this->Cell(185,0,$conca.'/'.'G.E.C.O.M.P.',0,0,'R');
}

}

// Instanciation of inherited class


$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('arial','',13);
$pdf->SetLeftMargin(18); #Establecemos los márgenes izquierda: 
$pdf->SetRightMargin(18); #Establecemos los márgenes Derecha: 
$pdf->Cell(170,10,'',0,1,'C'); 
$pdf->Cell(170,0,'CONSTANCIA',0,0,'C');

// Stylesheet
$pdf->SetStyle("p","arial","",12,"0,0,0",0);
$pdf->SetStyle("h1","arial","N",12,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",12,"0,0,0");
$pdf->SetStyle("pers","arial","I",0,"0,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","arial","B",0,"0,0,0");



$pdf->Ln(5);

// Text   ñ  í   ó   ú

$txt=utf8_encode($nombre)." ".utf8_encode($apellido);
$nombreEmp=strtolower($txt);
$txt="<vb>".ucwords($nombreEmp)."</vb>";
$NombreFirmas="<vb>".utf8_encode($nombreFirma)."</vb>";

$texto = "El (la) suscrito ".utf8_encode($puestoFirma)." del Ministerio Público hace constar que ".$txt.", con numero de identidad ".$Identidad.", labora por contrato en esta institución a partir del ".$fechaContrato.", y por acuerdo desde el ".$fechaAcuerdo.", actualmente se desempeña como: \t".trim($desempenio)."\t"." asignado a: ".utf8_encode($asignacion).", segun acuerdo ".$consultaAcuerdo['Nombre_Acuerdo']." que a partir del ".$nuevafrecha." se otorge un aumento salarial por costo de vida, siendo efectivo a partir del ".$Fecha_Efectivo.", con un sueldo mensual de: \t".ucfirst($var)."\t"." (L.  ".$formato.").";



$pdf->Cell(170,10,'',0,1,'C'); 
$pdf->WriteTag(0,7,utf8_decode($texto),0,"J",0,0);





$pdf->Cell(140,10,'',0,1,'L'); 
$pdf->Cell(90,0,utf8_decode('Maneja fondos de caja Chica'),0,1,'L'); 
$pdf->Cell(170,0,'-----------',0,1,'C'); 
$pdf->Cell(150,0,'L.  '.$formato_Chaja_Chica,0,1,'R'); 

$pdf->Cell(140,5,'',0,1,'L'); 
$pdf->Cell(90,0,utf8_decode('Recibe pago plus'),0,1,'L'); 
$pdf->Cell(170,0,'------------',0,1,'C'); 
$pdf->Cell(150,0,$formato_Plus_Sueldo,0,1,'R'); 

$pdf->Cell(140,5,'',0,1,'L'); 
$pdf->Cell(90,0,utf8_decode('Maneja Zonaje Plus'),0,1,'L'); 
$pdf->Cell(170,0,'------------',0,1,'C'); 
$pdf->Cell(150,0,$Formato_Zonaje_Plus,0,1,'R'); 

$pdf->Cell(140,5,'',0,1,'L'); 
$pdf->Cell(90,0,utf8_decode('Zonaje'),0,1,'L'); 
$pdf->Cell(170,0,'------------',0,1,'C'); 
$pdf->Cell(150,0,$Formato_Zonaje,0,1,'R'); 

$pdf->Cell(140,5,'',0,1,'L'); 
$pdf->Cell(90,0,utf8_decode('Maneja Fondos Rotatorios'),0,1,'L'); 
$pdf->Cell(170,0,'------------',0,1,'C'); 
$pdf->Cell(150,0,$formato_Fondo_Reint,0,1,'R'); 

$pdf->Cell(140,5,'',0,1,'L'); 
$pdf->Cell(90,0,utf8_decode('Maneja fondos de combustibles'),0,1,'L'); 
$pdf->Cell(170,0,'------------',0,1,'C'); 
$pdf->Cell(150,0,$formato_Fondo_Combus,0,1,'R'); 





$pdf->Cell(10,20,'',0,1,'C'); 
$texto1="La presente se extiende a petición de parte interasada, en la ciudad de Tegucigalpa, Municipio Central, a los ".$dia_actual." días del mes de ".$mes_actual." del ".$anio_actual;
$pdf->WriteTag(0,5,utf8_decode($texto1),0,"J",0,0);

$pdf->line();  
$pdf->Cell(10,50,'',0,1,'C'); 
//$pdf->Cell(172,5,'_________________________________________',0,1,'C');
$pdf->Cell(10,3,'',0,1,'C');
$pdf->WriteTag(0,7,$NombreFirmas,0,"C",0,0);
$pdf->Cell(10,0,'',0,1,'C');
$pdf->Cell(172,5,utf8_encode($puestoFirma),0,1,'C');

// Signature


 

//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>