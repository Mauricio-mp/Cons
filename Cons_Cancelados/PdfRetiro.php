<?php 
$validar=0;
 $Firma=$_GET['firma'];
 $Codigo=$_GET['codigo'];
 $FechaIncioAcuerdo=$_GET['f_I_A'];
 $FechaFinalAcuerdo=$_GET['f_F_A'];
 $FechaIncioContrato=$_GET['f_I_C'];
 $FechaFinalContrato=$_GET['f_F_C'];
 $Autoriza=$_GET['Autoriza'];
 $FechaRetiro=$_GET['FechaRetiro'];
 $Resolucion=$_GET['Resolucion'];
 $fechaResolucion=$_GET['FechaResolucion'];

 

//require('../fpdf/fpdf.php');
require('../fpdf/WriteTag.php');
require('ConversionSueldo.php');
require('ConversionFecha.php');
include('../crearConexionVam.php'); 

$Dia_Resolucion=(date('d',strtotime($fechaResolucion)));
 $mes_Resolucion=(date('m',strtotime($fechaResolucion)));
 $anio_Resolucion=(date('Y',strtotime($fechaResolucion)));

$optenerfechaResolucion= fecha($Dia_Resolucion,$mes_Resolucion,$anio_Resolucion);

$optenerHora= (date('g:i A',strtotime($fechaResolucion)));

$Dia_Retiro=(date('d',strtotime($FechaRetiro)));
 $mes_Retiro=(date('m',strtotime($FechaRetiro)));
 $anio_Retiro=(date('Y',strtotime($FechaRetiro)));

 $FechaRetiro=fecha($Dia_Retiro,$mes_Retiro,$anio_Retiro);

$Dia_Inicio_Contrato=(date('d',strtotime($FechaIncioContrato)));
 $mes_Inicio_Contrato=(date('m',strtotime($FechaIncioContrato)));
 $anio_Inicio_Contrato=(date('Y',strtotime($FechaIncioContrato)));

 $Dia_Final_Contrato=(date('d',strtotime($FechaFinalContrato)));
 $mes_Final_Contrato=(date('m',strtotime($FechaFinalContrato)));
 $anio_Final_Contrato=(date('Y',strtotime($FechaFinalContrato)));

$Dia_Inicio_Acuerdo=(date('d',strtotime($FechaIncioAcuerdo)));
 $mes_Inicio_Acuerdo=(date('m',strtotime($FechaIncioAcuerdo)));
 $anio_Inicio_Acuerdo=(date('Y',strtotime($FechaIncioAcuerdo)));

 $Dia_Final_Acuerdo=(date('d',strtotime($FechaFinalAcuerdo)));
 $mes_Final_Acuerdo=(date('m',strtotime($FechaFinalAcuerdo)));
 $anio_Final_Acuerdo=(date('Y',strtotime($FechaFinalAcuerdo)));


$fechaIncioContrato= fecha($Dia_Inicio_Contrato,$mes_Inicio_Contrato,$anio_Inicio_Contrato);
$fechaFinalContrato= fecha($Dia_Final_Contrato,$mes_Final_Contrato,$anio_Final_Contrato);
$fechaincioAcuerdo= fecha($Dia_Inicio_Acuerdo,$mes_Inicio_Acuerdo,$anio_Inicio_Acuerdo);
$fechaFinalAcuerdo= fecha($Dia_Final_Acuerdo,$mes_Final_Acuerdo,$anio_Final_Acuerdo);


$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fechaActual=fecha1($dia,$mes,$anio);


$mostrarDatos=mssql_query("SELECT * FROM prempy  WHERE cempno='$Codigo'");
if ($row=mssql_fetch_array($mostrarDatos)) {
    $DESC=$row['cfedid'];
    $codigoPuesto=$row['cjobtitle'];
    $codigoAsignado=$row['cdeptno'];
    $opnetersueldo=$row['nmonthpay'];
    $nombre=trim($row['cfname']);
    $apellido=trim($row['clname']);
    $identidad=$row['cfedid'];
    //echo "<script>alert('".$DESC."');</script>";

   $dia1 = date("d", strtotime($row['dhire']));
   $mes1 = date("m", strtotime($row['dhire']));
   $anio1 = date("Y", strtotime($row['dhire']));

   $dia2 = date("d", strtotime($row['dcntrct']));
   $mes2 = date("m", strtotime($row['dcntrct']));
   $anio2 = date("Y", strtotime($row['dcntrct']));
 
   $fechaContrato=fecha($dia1,$mes1,$anio1); 
   $fechaAcuerdo=fecha($dia2,$mes2,$anio2); 

 if ($FechaIncioAcuerdo=='' && $FechaFinalAcuerdo=='') {
  $validar=1;

  $mensaje1="bajo la modalidad de contrato a partir del ".$fechaIncioContrato." al ".$fechaFinalContrato;
}

if ($FechaIncioContrato=='' && $FechaFinalContrato=='') {
  $validar=1;
  $mensaje1="bajo la modalidad de Acuerdo ".$fechaincioAcuerdo." hasta el ".$fechaFinalAcuerdo;
}

if ($validar==0) {
  $mensaje1="bajo la modalidad de contrato a partir del ".$fechaIncioContrato." al ".$fechaFinalContrato." y bajo la modalidad de Acuerdo ".$fechaincioAcuerdo." hasta el ".$fechaFinalAcuerdo;
}



$var=convertir($opnetersueldo);
$formato=number_format($opnetersueldo,2);


$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=trim($ejecutar['cDesc']);
    $ConvertirDesen=strtolower($desempenio);
    $desempenio=ucwords($ConvertirDesen);
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=trim($asignado['cdeptname']);
    $ConvertiAsignacion=strtolower($asignacion);
    $asignacion=ucwords($ConvertiAsignacion);
}


    
}
$dia=date("d");
$mes=date("m");
$anio=date("Y");

$fechaActual=fecha1($dia,$mes,$anio); 

include('../crearConexionGECOMP.php');
$mostrarDato=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA='$Firma'");
if ($firma=mssql_fetch_array($mostrarDato)) {
  $nombreFirma=$firma['NOMBRE_EMPLEADO'];
  $convertirFirma=strtolower($nombreFirma);
  $nombreFirma=ucwords($convertirFirma);
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
    // Move to the right
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
    ///$this->Line(20,280,190,280);
    $this->Cell(0,0,'Edificio Lomas Plaza II, Lomas del guijaro, Avenida Republica Dominicana, Tegucigalpa D.M.C, Honduras C.A 1',0,0,'C');
    $this->Ln();
    $this->Cell(0,10,'apartado postal No, 3730, Tel:(504)2221-3099, FAX:(504)2221-5667',0,0,'C');
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
$pdf->SetStyle("vb","arial","B",13,"0,0,0");
$pdf->SetStyle("Negritas","arial","B",13,"0,0,0");



$pdf->Ln(5);

// Text   ñ  í   ó   ú
$txt=utf8_encode($nombre)." ".utf8_encode($apellido);
$ConvertirNombre=strtolower($txt);
$txt="<vb>".ucwords($ConvertirNombre)."</vb>";
$Descripcion="<vb>".utf8_encode('Descripción')."</vb>";
$monto="<vb>".utf8_encode('Monto')."</vb>";

$texto = "El (a) suscrito ".utf8_encode($puestoFirma)." del Ministerio Público hace constar que ".$txt.", con tarjeta de identidad No. ".$identidad." ha laborado en esta institución ".$mensaje1.", desempeñando el cargo de ".trim($desempenio)." asignado a ".utf8_encode($asignacion).", interponiendo su retiro Voluntario a partir del ".$FechaRetiro." ante el despacho del señor ".$Autoriza." de la Republica, declarada con lugar según Resolución No. ".$Resolucion." Notificado el ".$optenerfechaResolucion." a las ".$optenerHora;


 

$texto2="Constancia que se extiende a petición de parte interesada, en la ciudad de Tegucigalpa, Municipio del Distrito Central, a ".$fechaActual;





$pdf->Ln(5);
$pdf->WriteTag(0,7,utf8_decode($texto),0,"J",0,0);




$pdf->Cell(10,20,'',0,1,'C'); 
//$texto1="PARA LOS FINES QUE AL INTERESADO LE CONVENGA SE LE EXTIENDE LA PRESENTE EN LA CIUDAD DE TEGUCIGALPA, MUNICIPIO DEL DISTRITO CENTRAL A ".$fechaActual."";
$pdf->WriteTag(0,7,utf8_decode($texto2),0,"J",0,0);

$pdf->line();  
$pdf->Cell(10,50,'',0,1,'C'); 
$pdf->Cell(172,5,'________________________________________________',0,1,'C');
$pdf->Cell(10,3,'',0,1,'C');
$pdf->Cell(172,7,$nombreFirma,0,1,'C');
$pdf->Cell(10,0,'',0,1,'C');
$pdf->Cell(172,7,$puestoFirma,0,1,'C');

// Signature


 

//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>