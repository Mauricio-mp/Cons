<?php 
$validar=0;
 $Firma=$_GET['firma'];
 $conca=$_GET['ido'];
 $Codigo=$_GET['CodigoEmpleado'];
 $FechaIncioAcuerdo=$_GET['f_I_A'];
 $FechaFinalAcuerdo=$_GET['f_F_A'];
 $FechaIncioContrato=$_GET['f_I_C'];
 $FechaFinalContrato=$_GET['f_F_C'];

//require('../fpdf/fpdf.php');
require('../fpdf/WriteTag.php');
require('ConversionSueldo.php');
require('ConversionFecha.php');
include('../crearConexionVam.php'); 
include('../crearConexionGECOMP.php');
include('ConversionLetras.php');
$Consultafirma=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA='$Firma'");
if ($filaFirma=mssql_fetch_array($Consultafirma)) {
  $optenerFirma=$filaFirma['PUESTO_EMPLEADO'];
  $NombreFirma=$filaFirma['NOMBRE_EMPLEADO'];

  $ConvertirNombre=strtolower($NombreFirma);
  $NombreFirma=ucwords($ConvertirNombre);
  $convFirma=strtolower($optenerFirma);
  $optenerFirma=ucwords($convFirma);
}
include('../crearConexionVam.php');
$ConsultaNombre=mssql_query("SELECT * FROM prempy  WHERE cempno='$Codigo'");
if ($row=mssql_fetch_array($ConsultaNombre)) {
    $DESC=$row['cfedid'];
    $codigoPuesto=$row['cjobtitle'];
    $codigoAsignado=$row['cdeptno'];
    $opnetersueldo=$row['nmonthpay'];
    $nombre=trim($row['cfname']);
    $apellido=trim($row['clname']);
    $identidad=$row['cfedid'];
    $fechaIncioContrato=$row['dhire'];
    $fechaFinalAcuerdo=$row['dterminate'];
    $terminado=$row['ctaxstate'];
    // $date_future = strtotime('-1 day', strtotime($fechaFinalContrato));
    // $fechaFinalContrato = date('d-m-Y', $date_future);
    $fechaInicioAcuerdo=$row['dcntrct'];

    $date_future = strtotime('-1 day', strtotime($fechaInicioAcuerdo));
    $date_future = date('d-m-Y', $date_future);

     $Dia_Inicio_Contrato=(date('d',strtotime($fechaIncioContrato)));
     $mes_Inicio_Contrato=(date('m',strtotime($fechaIncioContrato)));
     $anio_Inicio_Contrato=(date('Y',strtotime($fechaIncioContrato)));

     $Dia_Final_Contrato=(date('d',strtotime($date_future)));
     $mes_Final_Contrato=(date('m',strtotime($date_future)));
     $anio_Final_Contrato=(date('Y',strtotime($date_future)));

     $Dia_Inicio_Acuerdo=(date('d',strtotime($fechaInicioAcuerdo)));
     $mes_Inicio_Acuerdo=(date('m',strtotime($fechaInicioAcuerdo)));
     $anio_Inicio_Acuerdo=(date('Y',strtotime($fechaInicioAcuerdo)));

      $Dia_Final_Acuerdo=(date('d',strtotime($fechaFinalAcuerdo)));
      $mes_Final_Acuerdo=(date('m',strtotime($fechaFinalAcuerdo)));
      $anio_Final_Acuerdo=(date('Y',strtotime($fechaFinalAcuerdo)));

     $FechaIncioContrato= fecha($Dia_Inicio_Contrato,$mes_Inicio_Contrato,$anio_Inicio_Contrato);
     $FechaFinalContrato= fecha($Dia_Final_Contrato,$mes_Final_Contrato,$anio_Final_Contrato);
     $FechaincioAcuerdo= fecha($Dia_Inicio_Acuerdo,$mes_Inicio_Acuerdo,$anio_Inicio_Acuerdo);
     $FechaFinalAcuerdo= fecha($Dia_Final_Acuerdo,$mes_Final_Acuerdo,$anio_Final_Acuerdo);

  
    if (strtotime($fechaIncioContrato) < strtotime($fechaInicioAcuerdo)) {
      $mensaje1="por la modalidad de Contrato en el periodo comprendido desde el".$FechaIncioContrato." hasta el ".$FechaFinalContrato." y por Acuerdo desde el".$FechaincioAcuerdo." hasta el ".$FechaFinalAcuerdo;
    }
     if (strtotime($fechaIncioContrato) > strtotime($fechaInicioAcuerdo)) {

      $date_future1 = strtotime('-1 day', strtotime($fechaIncioContrato));
    $date_future1 = date('d-m-Y', $date_future1);

    $Dia_Final_AC=(date('d',strtotime($date_future1)));
     $mes_Final_AC=(date('m',strtotime($date_future1)));
     $anio_Final_AC=(date('Y',strtotime($date_future1)));
     
     $FechaF_Acuerdo= fecha($Dia_Final_AC,$mes_Final_AC,$anio_Final_AC);

      $mensaje1="por la modalidad de Contrato en el periodo comprendido desde el ".$FechaincioAcuerdo." hasta el ".$FechaF_Acuerdo." y por Acuerdo desde el ".$FechaIncioContrato." hasta el ".$FechaFinalAcuerdo;
    }

     if (strtotime($fechaIncioContrato) == strtotime($fechaInicioAcuerdo)) {
      $mensaje1="por la modalidad de Acuerdo desde el ".$FechaincioAcuerdo." hasta el ".$FechaFinalAcuerdo;
    }


    //  if ($fechaIncioContrato==$fechaInicioAcuerdo) {
    //   $mensaje1="por la modalidad de Contrato el ".$FechaincioAcuerdo." al ".$FechaFinalAcuerdo;
    // }

    if ($terminado=='TC' && strtotime($fechaIncioContrato) < strtotime($fechaInicioAcuerdo)) {
       $mensaje1="por la modalidad de Contrato desde el ".$FechaincioAcuerdo." hasta el ".$FechaFinalAcuerdo;
    }

     if (strtotime($fechaIncioContrato) == strtotime($fechaInicioAcuerdo)) {
      $mensaje1="por la modalidad de Acuerdo desde el ".$FechaincioAcuerdo." hasta el ".$FechaFinalAcuerdo;
    }



    


    $NombreCompleto=utf8_encode($nombre)." ".utf8_encode($apellido);
    $NombresCompletos=$NombreCompleto;
    
    

 }

 $mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=titleCase(utf8_encode($ejecutar['cDesc']));
    
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=titleCase(utf8_encode($asignado['cdeptname']));
    
}



include('../crearConexionGECOMP.php');
$mostrarDato=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA='$Firma'");
if ($firma=mssql_fetch_array($mostrarDato)) {
  $nombreFirma=$firma['NOMBRE_EMPLEADO'];
  $convertirFirma=strtolower($nombreFirma);
  $nombreFirma=ucwords($convertirFirma);
  $puestoFirma=$firma['PUESTO_EMPLEADO'];
}


$dia=date("d");
$mes=date("m");
$anio=date("Y");

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
    //$this->SetTextColor(194,8,8);
    //$this->Cell(45,0,'Prueba',0,0,'C');
    // Move to the right
     $this->SetFont('Times','B',14);
     $this->SetTextColor(0,0,0);
    $this->Ln(40);
    $this->Cell(72);
    // Title
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
$pdf->Ln(3);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(172,0,'CONSTANCIA',0,0,'C');
$pdf->Cell(10,10,'',0,1,'C'); 
// Text   ñ  í   ó   ú
$txt=utf8_encode($nombre)." ".utf8_encode($apellido);
$ConvertirNombre=strtolower('rene augusto lopez orellana');
$txt="<vb>".ucwords($ConvertirNombre)."</vb>";
$Descripcion="<vb>".utf8_encode('Descripción')."</vb>";
$NombreCompleto="<vb>".strtoupper($NombresCompletos)."</vb>";
$nombreFirmas="<vb>".strtoupper($nombreFirma)."</vb>";

// $texto = "El (a) suscrito ".utf8_encode($puestoFirma)." del Ministerio Público hace constar que ".$txt.", con tarjeta de identidad No. ".$identidad." ha laborado en esta institución ".$mensaje1.", desempeñando el cargo de ".trim($desempenio)." asignado a ".utf8_encode($asignacion).".";

$texto="El (la) sucrito ".$optenerFirma." del Ministerio Público hace constar que ".$NombreCompleto.", con tarjeta de identidad numero ".$identidad.", laboró en esta institución ".$mensaje1.", desempeñando el cargo de: ".trim($desempenio).", asignado a: ".trim($asignacion).".";


 

// $texto2="Constancia que se extiende a petición de parte interesada, en la ciudad de Tegucigalpa, Municipio del Distrito Central, a ".$fechaActual;

$texto2="La presente se extiende a petición de parte interasada, en la ciudad de Tegucigalpa, Municipio Central, a los ".$dia_actual." días del mes de ".$mes_actual." del ".$anio_actual.".";





$pdf->Ln(5);
$pdf->WriteTag(0,7,utf8_decode($texto),0,"J",0,0);




$pdf->Cell(10,20,'',0,1,'C'); 
//$texto1="PARA LOS FINES QUE AL INTERESADO LE CONVENGA SE LE EXTIENDE LA PRESENTE EN LA CIUDAD DE TEGUCIGALPA, MUNICIPIO DEL DISTRITO CENTRAL A ".$fechaActual."";
$pdf->WriteTag(0,7,utf8_decode($texto2),0,"J",0,0);

$pdf->line();  
$pdf->Cell(10,18,'',0,1,'C'); 
//$pdf->Cell(172,5,'',0,1,'C');
//$pdf->Cell(10,3,'',0,1,'C');

$pdf->WriteTag(0,7,utf8_decode($nombreFirmas),0,"C",0,0);
$pdf->Cell(10,0,'',0,1,'C');
$pdf->Cell(172,7,$puestoFirma,0,1,'C');

// Signature


 

//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>