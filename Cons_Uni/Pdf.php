<?php 
$idFirma=$_GET['x'];
$numeroEmpleado=$_GET['proce'];

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
    $Nombre=trim($row['cfname']);
    $Apellido=trim($row['clname']);

    $nombreCompleto=$Nombre." ".$Apellido;
  $cambiarLetra=strtolower($nombreCompleto);

  $nombreCompleto=ucwords($cambiarLetra);
    //echo "<script>alert('".$DESC."');</script>";

    $dia1 = date("d", strtotime($row['dhire']));
   $mes1 = date("m", strtotime($row['dhire']));
   $anio1 = date("Y", strtotime($row['dhire']));

   $dia2 = date("d", strtotime($row['dcntrct']));
   $mes2 = date("m", strtotime($row['dcntrct']));
   $anio2 = date("Y", strtotime($row['dcntrct']));
 
   $fechaContrato=fecha($dia1,$mes1,$anio1); 
   $fechaAcuerdo=fecha($dia2,$mes2,$anio2); 

$fechaAactual=  date("Y-m-d");
   
   //$DateNum= Optenerfecha($mes,$anio);
$fechacon=date("Y-m-d", strtotime($row['dhire']));
  $fechaac=date("Y-m-d", strtotime($row['dcntrct']));
//inicio de validaciones importantes


if ($fechacon == $fechaac) {
$msg="ha laborado por acuerdo en esta institución a partir del ".strtolower($fechaContrato)."";
   }
 if ($fechacon<$fechaac) {
    $msg="ha laborado por contrato en esta institución a partir de ".strtolower($fechaContrato)." y por acuerdo desde el ".strtolower($fechaAcuerdo)."";
  }


//$var=convertir($opnetersueldo);
//$formato=number_format($opnetersueldo,2);


$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=trim($ejecutar['cDesc']);

    $pasarAminuscula=strtolower($desempenio);

    $desempenio=ucwords($pasarAminuscula);
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=trim($asignado['cdeptname']);

    $minuscula=strtolower($asignacion);
    $asignacion=ucwords($minuscula);
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

  $Minuscula=strtolower($nombreFirma);
  $nombreFirma=ucwords($Minuscula);
  $puestoFirma=$firma['PUESTO_EMPLEADO'];
}


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
    $this->Ln(40);
    $this->Cell(72);
    // Title

    $this->Cell(45,0,'CONSTANCIA',0,0,'C');
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
    //$this->Line(20,280,190,280);
    $this->Cell(0,0,'Edificio Lomas Plaza II, Lomas del guijaro, Avenida Republica Dominicana, Tegucigalpa D.M.C, Honduras C.A 1',0,0,'C');
    $this->Ln();
    $this->Cell(0,10,'apartado postal No, 3730, Tel:(504)2221-3099, FAX:(504)2221-5667',0,0,'C');
    $this->Ln();
    $this->SetTextColor(0,0,0);
    $this->Cell(185,0,'G.E.C.O.M.P.',0,0,'R');
}

}

// Instanciation of inherited class


$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',13);
$pdf->SetLeftMargin(18); #Establecemos los márgenes izquierda: 
$pdf->SetRightMargin(18); #Establecemos los márgenes Derecha: 


// Stylesheet
$pdf->SetStyle("p","Arial","",13,"0,0,0",0);
$pdf->SetStyle("h1","arial","N",13,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",13,"0,0,0");
$pdf->SetStyle("pers","arial","I",0,"0,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","arial","B",0,"0,0,0");



$pdf->Ln(5);


// Text
$txt=" 
<p>El (la) suscrito(a) ".$puestoFirma." del Ministerio Público hace constar que <vb>".$nombreCompleto."</vb>, ".strtolower($msg).", actualmente se desempeña como ".strtolower(trim($desempenio))." "."asignado a ".strtolower($asignacion).".</p>
";
//$msg="HA LABORADO POR CONTRATO EN ESTA INSTITUCION APARTIR DE ".$fechaContrato." Y POR ACUERDO DESDE EL ".$fechaAcuerdo.",";

$texto1=" <p>Constancia que se expide a petición de parte interesada, en la Ciudad de Tegucigalpa, Municipio del distrito Central, a ".$fechaActual.".
</p>";


$pdf->WriteTag(0,7,utf8_decode($txt),0,"J",0,0);
$pdf->Cell(10,10,'',0,1,'C'); 
$pdf->WriteTag(0,7,utf8_decode($texto1),0,"J",0,0);


$pdf->line();  
$pdf->Cell(10,50,'',0,1,'C'); 
$pdf->Cell(172,5,'_________________________________________',0,1,'C');
$pdf->Cell(10,3,'',0,1,'C');
$pdf->Cell(172,5,$nombreFirma,0,1,'C');
$pdf->Cell(10,0,'',0,1,'C');
$pdf->Cell(172,5,$puestoFirma,0,1,'C');

// Signature


 

//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>