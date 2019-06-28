<?php 
$idFirma=$_GET['x'];
$numeroEmpleado=$_GET['proce'];
$idembajada=$_GET['y'];
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
    $identidad=$row['cfedid'];
    $nombre=trim($row['cfname']);
    $apellido=trim($row['clname']);
    //echo "<script>alert('".$DESC."');</script>";

   $dia1 = date("d", strtotime($row['dhire']));
   $mes1 = date("m", strtotime($row['dhire']));
   $anio1 = date("Y", strtotime($row['dhire']));

   $dia2 = date("d", strtotime($row['dcntrct']));
   $mes2 = date("m", strtotime($row['dcntrct']));
   $anio2 = date("Y", strtotime($row['dcntrct']));
 
   $fechaContrato=fecha2($dia1,$mes1,$anio1); 
   $fechaAcuerdo=fecha2($dia2,$mes2,$anio2); 

  if ($row['dhire']==$row['dcntrct']) {
    $msg=", labora en esta Institución desde los ".$fechaContrato.", ";
  }
  if ($row['dhire']>$row['dcntrct']) {
    $msg=", labora en esta Institución desde los ".$fechaContrato.", ";
  }
$var=convertir($opnetersueldo);
$formato=number_format($opnetersueldo,2);


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
$fechaActual=fecha2($dia,$mes,$anio); 


include('../crearConexionGECOMP.php');
$mostrarDato=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA='$idFirma'");
if ($firma=mssql_fetch_array($mostrarDato)) {
  $nombreFirma=$firma['NOMBRE_EMPLEADO'];
  $puestoFirma=$firma['PUESTO_EMPLEADO'];
}

$mostrarDatoq=mssql_query("SELECT * FROM EMBAJADAS_CONSULADOS WHERE Id_EMBAJADA='$idembajada'");
if ($embajada=mssql_fetch_array($mostrarDatoq)) {
  $nombreembajada=$embajada['NOMBRE_EMBAJADA'];
 
}


class PDF extends PDF_WriteTag
{
// Page header
function Header()
{
    // Logo
    $this->Image('../img/9.png',70,10,90);
    // Arial bold 15
    $this->SetFont('Times','B',14);
    // Move to the right
    $this->Ln(25);
    $this->Cell(72);
    // Title
    //$this->Cell(45,0,'CONSTANCIA',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
      // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->SetLineWidth(0);
    $this->Line(20,280,190,280);
    $this->Cell(0,0,'Edificio Lomas Plaza II, Lomas del guijaro, Avenida Republica Dominicana, Tegucigalpa D.M.C, Honduras C.A 1',0,0,'C');
    $this->Ln();
    $this->Cell(0,10,'apartado postal No, 3730, Tel:(504)2221-3099, FAX:(504)2221-5667',0,0,'C');
}

}

// Instanciation of inherited class







$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);
$pdf->SetMargins(25,0,25);
$pdf->SetFont('courier','',12);
$pdf->AddPage();






$pdf->SetAlpha(0.2);


 $pdf->Image('../img/9.png',0,85,225);

$pdf->SetAlpha(1);





// Stylesheet
$pdf->SetStyle("p","arial","N",14,"0,0,0",0);
$pdf->SetStyle("h1","arial","N",14,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",14,"0,0,0");
$pdf->SetStyle("pers","arial","I",14,"0,0,0");
$pdf->SetStyle("place","arial","U",14,"0,0,0");
$pdf->SetStyle("vb","arial","B",14,"0,0,0");




// Text
$txt1=" 
<p>Tegucigalpa, M.D.C., ".$fechaActual."</p>
";

$txt2=" 
<p>Presente.-</p>
";

$txt3=" 
<p>El(La) Suscrito(a), ".strtolower($puestoFirma).", HACE CONSTAR: Que el(la) Señor(a) <vb>".$nombre." ".$apellido."</vb>, con número de identidad <vb>".$identidad."</vb>".$msg."en el cargo de <vb>".trim($desempenio)."</vb>, asignada a, <vb>".$asignacion."</vb> devengando un salario mensual de L <vb>".$formato." (".$var.")</vb>.</p>
";


$texto1=" <p>Y para los fines que al interesado (a) convengan, se le extiende la presente en la ciudad de Tegucigalpa, Municipio del Distrito Central, a los ".$fechaActual.".
</p>";


$txtembajada=" 
<p><vb>".$nombreembajada."</vb></p>
";


$pdf->Ln(10);
$pdf->WriteTag(0,5,utf8_decode($txt1),0,"J",0,0);
$pdf->Ln(10);
 $pdf->SetX(24);
$pdf->Cell(0,0,utf8_decode('Señores'),0,0,'L'); 
$pdf->Ln(4);
$pdf->WriteTag(0,5,utf8_decode($txtembajada),0,"J",0,0);
$pdf->Ln(1);
$pdf->WriteTag(0,5,utf8_decode($txt2),0,"J",0,0);
$pdf->Ln(8);
$pdf->WriteTag(0,5,utf8_decode($txt3),0,"J",0,0);

$pdf->Ln(8);
$pdf->WriteTag(0,5,utf8_decode($texto1),0,"J",0,0);


$pdf->line();  
$pdf->Cell(10,25,'',0,1,'C'); 

$pdf->Cell(172,5,'_____________________________________________',0,1,'C');
$pdf->Cell(10,3,'',0,1,'C');
$pdf->Cell(172,5,$nombreFirma,0,1,'C');
$pdf->Cell(10,0,'',0,1,'C');
$pdf->Cell(172,5,$puestoFirma,0,1,'C');

// Signature


 

//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>